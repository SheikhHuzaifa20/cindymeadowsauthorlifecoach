@extends('layouts.app')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Blog Comments</h3>
        <div class="row breadcrumbs-top d-inline-block">
        </div>
    </div>
    <div class="content-header-right col-md-4 col-12">
        <div class="btn-group float-md-right">
            <a class="btn btn-info mr-1 mb-1" href="{{ route('admin.blog.comments.create', $blog->id) }}"><i class="la la-plus"></i> Add Comment</a>
            <a class="btn btn-secondary mb-1" href="{{ route('admin.blog.index') }}">Back to Blogs</a>
        </div>
    </div>
</div>

<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4 class="card-title">Comments for {{ $blog->title }}</h4></div>
                <div class="card-body card-dashboard">
                    <form method="GET" action="{{ route('admin.blog.comments', $blog->id) }}" class="row mb-3 align-items-end">
                        <div class="col-md-3 mb-2">
                            <label for="search">Search</label>
                            <input class="form-control" id="search" name="search" type="search" value="{{ request('search') }}" placeholder="Name, email or comment">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">All statuses</option>
                                @foreach(['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'] as $value => $label)
                                    <option value="{{ $value }}" {{ request('status') === $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="from_date">Date From</label>
                            <input class="form-control" id="from_date" name="from_date" type="date" value="{{ request('from_date') }}">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="to_date">Date To</label>
                            <input class="form-control" id="to_date" name="to_date" type="date" value="{{ request('to_date') }}">
                        </div>
                        <div class="col-md-3 mb-2">
                            <button class="btn btn-primary mr-1" type="submit"><i class="la la-search"></i> Filter</button>
                            <a class="btn btn-secondary" href="{{ route('admin.blog.comments', $blog->id) }}">Reset</a>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr><th>ID</th><th>Comment</th><th>Author</th><th>Status</th><th>Created At</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                                @forelse($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td><div style="white-space: pre-wrap;">{{ $comment->comment }}</div></td>
                                        <td>
                                            <strong>{{ $comment->name }}</strong><br>
                                            <a href="mailto:{{ $comment->email }}">{{ $comment->email }}</a>
                                            @if($comment->website)
                                                <br><a href="{{ $comment->website }}" target="_blank" rel="noopener noreferrer">Website</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($comment->status === 'approved')
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($comment->status === 'rejected')
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ optional($comment->created_at)->format('d M, Y h:i A') }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info mb-1" href="{{ route('admin.blog.comment.edit', $comment->id) }}" title="Edit comment">
                                                <i class="la la-pencil"></i> Edit
                                            </a>
                                            {{--
                                            @if($comment->status !== 'approved')
                                                <form class="d-inline" method="POST" action="{{ route('admin.blog.comment.approve', $comment->id) }}">
                                                    @csrf
                                                    <button class="btn btn-sm btn-success mb-1" type="submit">Approve</button>
                                                </form>
                                            @endif
                                            @if($comment->status !== 'rejected')
                                                <form class="d-inline" method="POST" action="{{ route('admin.blog.comment.reject', $comment->id) }}">
                                                    @csrf
                                                    <button class="btn btn-sm btn-warning mb-1" type="submit">Reject</button>
                                                </form>
                                            @endif
                                            --}}
                                            <form class="d-inline js-delete-comment" method="POST" action="{{ route('admin.blog.comment.destroy', $comment->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger mb-1" type="submit" title="Delete comment">
                                                    <i class="la la-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center">No comments found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function () {
    @if(session('comment_success'))
        Swal.fire({ icon: 'success', title: @json(session('comment_success')), timer: 2200, showConfirmButton: false });
    @endif

    $('.js-delete-comment').on('submit', function (event) {
        event.preventDefault();
        const form = this;
        Swal.fire({
            icon: 'warning',
            title: 'Delete this comment?',
            text: 'This action cannot be undone.',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#d33'
        }).then(function (result) {
            if (result.isConfirmed) form.submit();
        });
    });
});
</script>
@endpush