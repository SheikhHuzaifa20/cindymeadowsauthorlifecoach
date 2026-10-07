<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function index(Request $request, Blog $blog)
    {
        $query = $blog->allComments();

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->input('from_date'));
        }
        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->input('to_date'));
        }
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($comments) use ($search) {
                $comments->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('comment', 'like', "%{$search}%");
            });
        }

        $comments = $query->paginate(15)->withQueryString();
        return view('admin.blog.comments.index', compact('blog', 'comments'));
    }

    public function create(Blog $blog)
    {
        return view('admin.blog.comments.create', compact('blog'));
    }

    public function store(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'comment' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $blog->allComments()->create($data);

        return redirect()->route('admin.blog.comments', $blog->id)
            ->with('comment_success', 'Comment added successfully.');
    }

    public function edit(BlogComment $comment)
    {
        $comment->load('blog');
        return view('admin.blog.comments.edit', compact('comment'));
    }

    public function update(Request $request, BlogComment $comment)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'comment' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $comment->update($data);

        return redirect()->route('admin.blog.comments', $comment->blog_id)
            ->with('comment_success', 'Comment updated successfully.');
    }

    /**
     * Approve a comment.
     */
    public function approve(BlogComment $comment)
    {
        $comment->update(['status' => 'approved']);
        return redirect()->route('admin.blog.comments', $comment->blog_id)
            ->with('comment_success', 'Comment approved.');
    }

    /**
     * Reject a comment.
     */
    public function reject(BlogComment $comment)
    {
        $comment->update(['status' => 'rejected']);
        return redirect()->route('admin.blog.comments', $comment->blog_id)
            ->with('comment_success', 'Comment rejected.');
    }

    /**
     * Delete a comment.
     */
    public function destroy(BlogComment $comment)
    {
        $blogId = $comment->blog_id;
        $comment->delete();
        return redirect()->route('admin.blog.comments', $blogId)
            ->with('comment_success', 'Comment deleted.');
    }
}
