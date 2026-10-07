@extends('layouts.app')

@push('before-css')
<link rel="stylesheet" href="{{ asset('plugins/vendors/dropify/dist/css/dropify.min.css') }}">
@endpush

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Create New Blog</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog Management</a></li>
                    <li class="breadcrumb-item active">Create New Blog</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content-body">
    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Blog Info</h4>
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
                            <form class="form" enctype="multipart/form-data" method="post" action="{{ route('admin.blog.store') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">

                                        {{-- Title --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                <input class="form-control" required name="title" type="text" id="title" placeholder="Blog post title">
                                            </div>
                                        </div>

                                        {{-- Short Description (CKEditor) --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="short_description_editor">Short Description
                                                    <small class="text-muted">(shown on blog listing page as excerpt)</small>
                                                </label>
                                                <textarea name="short_description" id="short_description_editor" cols="30" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        {{-- Main Description (CKEditor) --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="summary-ckeditor">Main Description / Content</label>
                                                <textarea name="description" id="summary-ckeditor" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        {{-- Blog Image --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="input-file-now">Blog Featured Image <span class="text-danger">*</span></label>
                                                <div class="upload-photo">
                                                    <input type="file" name="image" id="input-file-now" class="dropify" required />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-actions text-right pb-0">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Create Blog &amp; Add Sections
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

                                {{-- <div class="alert alert-info mb-2">
                                    <strong><i class="la la-info-circle"></i> How it works:</strong>
                                    <ol class="mt-1 pl-3 mb-0">
                                        <li>Fill in the title, short description, main content and image.</li>
                                        <li>Click <strong>"Create Blog &amp; Add Sections"</strong>.</li>
                                        <li>After saving, you'll be redirected to the edit page where you can <strong>add dynamic sections</strong> (headings, paragraphs, images, videos).</li>
                                    </ol>
                                </div>

                                <div class="alert alert-secondary">
                                    <strong>Short Description</strong> — This is the teaser text shown on the blog listing page.<br>
                                    <strong>Main Description</strong> — This is the opening content of the full blog detail page.<br>
                                    <strong>Sections</strong> — Add as many extra content blocks as needed from the edit page.
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')
<script src="{{ asset('plugins/vendors/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(function() {
        $('.dropify').dropify();

        // Initialize CKEditor for Short Description
        if ($('#short_description_editor').length && typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('short_description_editor', {
                toolbar: 'Basic',
                height: 150
            });
        }

        // Initialize CKEditor for Main Description
        if ($('#summary-ckeditor').length && typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('summary-ckeditor');
        }
    });
</script>
@endpush