@extends('layouts.admin_app')

@section('style')

<link href="{{ asset('admin-assets/plugins/image-uploader/src/image-uploader.css') }}" rel="stylesheet" type="text/css" />
<style>

    /* Container styling */
    .image-uploader {
        border: 2px dashed #cbd5e0;
        border-radius: 8px;
        background-color: #f8fafc;
        min-height: 200px;
        padding: 20px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        cursor: pointer !important;
    }

    .upload-text .iui-cloud-upload {
        font-size: 40px;
        color: #63b3ed;
        margin-bottom: 10px;
    }

    .upload-text span {
        color: #4a5568;
        font-size: 16px;
        margin: 0;
    }

</style>

@endsection

@section('content')

    @include('layouts.partials._breadcrumb', ['title' => 'Create Publication', 'section' => 'Publications', 'page' => 'Create'])

    @if(session()->has('success'))
        <div class="alert alert-success border-0 alert-dismissible fade show" role="alert">
            <strong>Well done!</strong> {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header bg-light">
                    <h4 class="card-title">Add Publication</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('admin.publications.store') }}" novalidate>    
                        @csrf          
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="my-2 form-label fw-bold">Publication Type <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="publication_type" id="book" value="book" checked />
                                    <label class="form-check-label" for="book">
                                        Book
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="publication_type" id="chapter" value="chapter" />
                                    <label class="form-check-label" for="chapter">
                                        Chapter
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="publication_type" id="assignment" value="assignment" />
                                    <label class="form-check-label" for="chapter">
                                        Assignment
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="title" class="form-label fw-bold">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title" required />
                                <div class="invalid-feedback">
                                    Title is a required field.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="author" class="form-label fw-bold">Author <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" placeholder="Enter author" required />
                                <div class="invalid-feedback">
                                    Author is a required field.
                                </div>
                            </div>
                        </div>      
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="summary" class="form-label fw-bold">Summary/Conculsion </label>
                                <textarea class="form-control" id="summary" name="summary" rows="4">{{ old('summary') }}</textarea>
                                <div class="invalid-feedback">
                                    Summary is a required field.
                                </div>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="images" class="form-label fw-bold">Image <span class="text-danger">*</span></label>
                                <div class="input-images-1"></div>
                                <small class="form-text text-muted">Max 1 image allowed, each image should not exceed 2MB</small>
                                <div class="invalid-feedback">
                                    Image is a required field.
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Create Publication</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

<script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/image-uploader/src/image-uploader.js') }}"></script>
<script>
    
    $(function () {
        $('.input-images-1').imageUploader({
            imagesInputName: 'image',
            maxFiles: 1,
            extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
            maxSize: 2 * 1024 * 1024
        });
    });
</script>

@endsection