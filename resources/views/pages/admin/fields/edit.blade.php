@extends('layouts.admin_app')

@section('style')
@endsection

@section('content')

    @include('layouts.partials._breadcrumb', ['title' => 'Edit Field', 'section' => 'Fields', 'page' => 'Edit'])

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
        <div class="col-sm-8 pb-4">
            <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('admin.fields.update', $field->id) }}" novalidate>    
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Edit Field</h4>
                    </div><!--end card-header-->
                    <div class="card-body">          
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="name" class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $field->name }}" placeholder="Enter field name" required />
                                <div class="invalid-feedback">
                                    Field name is a required field.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Update Field</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
@endsection