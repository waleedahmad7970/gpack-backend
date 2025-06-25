@extends('layouts.admin_app')

@section('style')
@endsection

@section('content')

    @include('layouts.partials.admin._breadcrumb', ['title' => "Edit Admin", 'section' => "Settings / Admins", 'page' => 'Edit'])

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
                    <h4 class="card-title">Edit Admin</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('admin.admins.update', $admin->id) }}" novalidate>    
                        @csrf          
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="avatar" class="text-muted"><small>Photo</small></label>
                            <img 
                                src="{{ asset($admin->photo) }}" 
                                alt="{{ $admin->name }}" 
                                class="thumb-lg rounded mx-3"
                                id="avatar"
                                onerror="this.onerror=null;this.src='{{ asset('admin-assets/images/users/user-vector.png') }}'" 
                            >
                            <label class="btn btn-de-primary btn-sm text-light">
                                Change Avatar 
                                <input 
                                    type="file" 
                                    hidden
                                    accept="image/*" 
                                    value="{{ $admin->photo }}" 
                                    id="imgInp" 
                                    name="photo"
                                    onchange="imagePreview(event)"
                                />
                            </label>
                        </div><!--end form-group-->
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="name" class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" placeholder="Enter full name" required />
                                <div class="invalid-feedback">
                                    Name is a required field.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" placeholder="Enter email" required />
                                <div class="invalid-feedback">
                                    Email is a required field.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="address" class="form-label fw-bold">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $admin->address }}" placeholder="Enter address" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="phone" class="form-label fw-bold">Phone </label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $admin->phone }}" placeholder="Enter phone" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-check form-switch form-switch-success">
                                    <input 
                                        class="form-check-input" 
                                        name="active" 
                                        type="checkbox" 
                                        id="active" 
                                        {{ $admin->status == 'active' ? 'checked' : '' }}
                                    />
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>          
                        <div class="row mt-2">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success">Update Admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

   <script>
        let imagePreview = function(event) {
            let newImage = event.target.files[0];
            let imageExt = newImage.type;
            if(imageExt == "image/jpg" || imageExt == "image/png" || imageExt == "image/gif" || imageExt == "image/svg" || imageExt == "image/jpeg") {
                let imgPreview = document.getElementById('avatar');
                imgPreview.src = URL.createObjectURL(newImage);
            } else {
                alert('Only images allowed');
            } 
        };
    </script>
    
@endsection