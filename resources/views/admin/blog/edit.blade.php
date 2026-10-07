@extends('layouts.app')
@push('before-css')
<link rel="stylesheet" href="{{ asset('plugins/vendors/dropify/dist/css/dropify.min.css') }}">
@endpush
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Edit Blog</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog Management</a></li>
                    <li class="breadcrumb-item active">Edit Blog #{{ $blog->id }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right">
            <a class="btn btn-info mb-1" href="{{ url('admin/blog') }}">Back</a>
        </div>
    </div>
</div>

<div class="content-body">
    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Edit Blog #{{ $blog->id }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" enctype="multipart/form-data" method="post" action="{{ route('admin.blog.update', $blog->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">

                                        {{-- Title --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input class="form-control" required name="title" type="text" id="title" value="{{ $blog->title }}">
                                            </div>
                                        </div>

                                        {{-- Short Description --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="short_description_editor">Short Description
                                                    <small class="text-muted">(shown on blog listing page as excerpt)</small>
                                                </label>
                                                <textarea name="short_description" id="short_description_editor" cols="30" rows="4" class="form-control">{{ $blog->short_description }}</textarea>
                                            </div>
                                        </div>

                                        {{-- Main Description --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="summary-ckeditor">Main Description</label>
                                                <textarea name="description" id="summary-ckeditor" cols="30" rows="10" class="form-control">{{ $blog->description }}</textarea>
                                            </div>
                                        </div>

                                        {{-- Blog Image --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Blog Image</label>
                                                @if($blog->image)
                                                    <div class="mb-2">
                                                        <img src="{{ asset($blog->image) }}" alt="" style="max-width: 200px; border-radius: 6px;">
                                                    </div>
                                                @endif
                                                <div class="upload-photo">
                                                    <input type="file" name="image" id="input-file-now" class="dropify"
                                                        {{ $blog->image ? 'data-default-file=' . asset($blog->image) : '' }} />
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Dynamic Sections --}}
                                        @foreach ($blog->sections as $section)
                                            <div class="col-md-12 blog-section-block" id="blog-section-{{ $section->id }}">
                                                <div class="form-group">
                                                    <label>{{ $section->label }}
                                                        <small class="text-muted">({{ $section->type }})</small>
                                                    </label>

                                                    @if ($section->type === 'image')
                                                        @if($section->value)
                                                            <div class="mb-2">
                                                                <img src="{{ asset($section->value) }}" alt="" style="max-width: 150px; border-radius: 4px;">
                                                            </div>
                                                        @endif
                                                        <input type="file" name="{{ $section->slug }}"
                                                            class="dropify"
                                                            {{ $section->value ? 'data-default-file=' . asset($section->value) : '' }}>

                                                    @elseif($section->type === 'textarea')
                                                        <textarea name="{{ $section->slug }}"
                                                            id="blog-ckeditor-{{ $section->id }}"
                                                            class="form-control">{{ $section->value }}</textarea>
                                                        @push('js')
                                                        <script>
                                                            if ($('#blog-ckeditor-{{ $section->id }}').length) {
                                                                if (!CKEDITOR.instances['blog-ckeditor-{{ $section->id }}']) {
                                                                    CKEDITOR.replace('blog-ckeditor-{{ $section->id }}');
                                                                }
                                                            }
                                                        </script>
                                                        @endpush

                                                    @elseif($section->type === 'video')
                                                        @if($section->value)
                                                            <video width="200" controls class="d-block mb-2">
                                                                <source src="{{ asset($section->value) }}">
                                                            </video>
                                                        @endif
                                                        <input type="file" name="{{ $section->slug }}"
                                                            class="dropify"
                                                            {{ $section->value ? 'data-default-file=' . asset($section->value) : '' }}>

                                                    @else
                                                        <input type="text" name="{{ $section->slug }}"
                                                            value="{{ $section->value }}" class="form-control">
                                                    @endif

                                                    {{-- Delete Section Button --}}
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm mt-1 deleteBlogSection"
                                                        data-id="{{ $section->id }}">
                                                        <i class="la la-trash"></i> Delete Section
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{-- Add New Section Button --}}
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                                                data-target="#addBlogSectionModal">
                                                + Add New Section
                                            </button>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-actions text-right pb-0">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Update Blog
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">Information</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="card-text">
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="alert alert-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if(Session::has('message'))
                                    <ul>
                                        <li class="alert alert-success">{{ Session::get('message') }}</li>
                                    </ul>
                                @endif
                                {{-- <div class="alert alert-info">
                                    <p class="mb-1"><strong>Sections:</strong> {{ $blog->sections->count() }} section(s) added</p>
                                    <p class="mb-0"><small>Use <strong>"+ Add New Section"</strong> to add headings, paragraphs, images, or videos to this blog post's detail page.</small></p>
                                </div>
                                <a href="{{ route('blog.detail', \Illuminate\Support\Str::slug($blog->title)) }}" target="_blank" class="btn btn-outline-secondary btn-sm w-100 mt-1">
                                    <i class="la la-eye"></i> Preview Blog Post
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Add Section Modal --}}
<div class="modal fade" id="addBlogSectionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Section</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addBlogSectionForm">
                    @csrf
                    <div class="form-group">
                        <label>Label <small class="text-muted">(e.g. "Why This Matters", "Key Takeaways")</small></label>
                        <input type="text" name="label" class="form-control" required placeholder="Section label">
                    </div>
                    <div class="form-group">
                        <label>Slug <small class="text-muted">(unique identifier, e.g. "why_this_matters")</small></label>
                        <input type="text" name="slug" class="form-control" required placeholder="section_slug">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" class="form-control" required>
                            <option value="text">Text (plain)</option>
                            <option value="textarea">Textarea (rich HTML)</option>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Section</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('plugins/vendors/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(function() {
        // Init plugins
        $('.dropify').dropify();

        if ($('#summary-ckeditor').length && typeof CKEDITOR !== 'undefined') {
            if (!CKEDITOR.instances['summary-ckeditor']) {
                CKEDITOR.replace('summary-ckeditor');
            }
        }

        if ($('#short_description_editor').length && typeof CKEDITOR !== 'undefined') {
            if (!CKEDITOR.instances['short_description_editor']) {
                CKEDITOR.replace('short_description_editor', { height: 150 });
            }
        }

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        function initPlugins() {
            $('.dropify:not(.dropify-wrapper)').dropify();
            $('textarea[id^="blog-ckeditor-"]').each(function() {
                let id = $(this).attr('id');
                if (typeof CKEDITOR !== 'undefined' && !CKEDITOR.instances[id]) {
                    CKEDITOR.replace(id);
                }
            });
        }

        // Add Section via AJAX
        $('#addBlogSectionForm').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const blogId = {{ $blog->id }};
            let url = "{{ route('admin.blog.sections.store', ['blog' => ':id']) }}".replace(':id', blogId);

            $.ajax({
                url: url,
                method: 'POST',
                data: form.serialize(),
                success: function(res) {
                    if (res.status === 'success') {
                        $('#addBlogSectionModal').modal('hide');
                        form.trigger('reset');

                        if (typeof showToast === 'function') showToast(res.message, 'success');

                        let s = res.section;
                        let html = `<div class="col-md-12 blog-section-block" id="blog-section-${s.id}">
                            <div class="form-group">
                                <label>${s.label} <small class="text-muted">(${s.type})</small></label>`;

                        if (s.type === 'text') {
                            html += `<input type="text" name="${s.slug}" class="form-control">`;
                        } else if (s.type === 'textarea') {
                            html += `<textarea name="${s.slug}" id="blog-ckeditor-${s.id}" class="form-control"></textarea>`;
                        } else if (s.type === 'image' || s.type === 'video') {
                            html += `<input type="file" name="${s.slug}" class="dropify">`;
                        }

                        html += `<button type="button" class="btn btn-danger btn-sm mt-1 deleteBlogSection" data-id="${s.id}">
                                    <i class="la la-trash"></i> Delete Section
                                </button>
                            </div>
                        </div>`;

                        // Insert before the "Add New Section" button column
                        $('.form-body .row .col-md-12:last').before(html);
                        initPlugins();
                    }
                },
                error: function(err) {
                    if (typeof showToast === 'function') showToast(err.responseJSON?.message || 'Something went wrong', 'error');
                    else alert(err.responseJSON?.message || 'Something went wrong');
                }
            });
        });

        // Delete Section via AJAX
        $(document).on('click', '.deleteBlogSection', function() {
            const id = $(this).data('id');
            if (!confirm('Are you sure you want to delete this section?')) return;

            let url = "{{ route('admin.blog.sections.destroy', ['blogSection' => ':id']) }}".replace(':id', id);

            $.ajax({
                url: url,
                method: 'DELETE',
                data: { _token: "{{ csrf_token() }}" },
                success: function(res) {
                    if (res.status === 'success') {
                        $('#blog-section-' + id).remove();
                        if (typeof showToast === 'function') showToast(res.message, 'info');
                    }
                },
                error: function() {
                    if (typeof showToast === 'function') showToast('Unable to delete section', 'error');
                    else alert('Unable to delete section');
                }
            });
        });

        // Auto-generate slug from label in modal
        $('[name="label"]').on('input', function() {
            let slug = $(this).val()
                .toLowerCase()
                .replace(/[^a-z0-9\s]/g, '')
                .trim()
                .replace(/\s+/g, '_');
            $('[name="slug"]').val(slug);
        });
    });
</script>
@endpush