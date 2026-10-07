<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogSection;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class BlogSectionController extends Controller
{
    use FileUploadTrait;

    /**
     * Store a new section for a blog post.
     */
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'slug'  => 'required|string|max:255',
            'type'  => 'required|in:text,textarea,image,video',
        ]);

        $section = BlogSection::create([
            'blog_id'    => $blog->id,
            'label'      => $request->label,
            'slug'       => $request->slug,
            'type'       => $request->type,
            'value'      => null,
            'sort_order' => BlogSection::where('blog_id', $blog->id)->max('sort_order') + 1,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Section added successfully.',
            'section' => $section,
        ]);
    }

    /**
     * Update section value (file upload or text).
     */
    public function updateValue(Request $request, BlogSection $blogSection)
    {
        if ($request->hasFile('value')) {
            $this->deleteFile($blogSection->value);
            $path = $this->uploadFile($request->file('value'), 'uploads/blog/sections/', 'blog_section');
            $blogSection->update(['value' => $path]);
        } else {
            $blogSection->update(['value' => $request->input('value')]);
        }

        return response()->json(['status' => 'success', 'message' => 'Section updated.']);
    }

    /**
     * Delete a section.
     */
    public function destroy(BlogSection $blogSection)
    {
        if (in_array($blogSection->type, ['image', 'video'])) {
            $this->deleteFile($blogSection->value);
        }
        $blogSection->delete();

        return response()->json(['status' => 'success', 'message' => 'Section deleted.']);
    }
}
