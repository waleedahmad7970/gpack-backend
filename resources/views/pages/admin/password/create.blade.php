@extends('layouts.admin_app')

@section('style')
@endsection

@section('content')

    @include('layouts.partials.admin._breadcrumb', ['title' => "Change Password", 'section' => "Settings", 'page' => 'Password'])

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
                    <h4 class="card-title">Change Password</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('admin.password.store') }}" novalidate>    
                        @csrf          
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="current_password" class="form-label fw-bold">Current Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="current_password" name="current_password" value="{{ old('current_password') }}" placeholder="Enter current password" required />
                                <div class="invalid-feedback">
                                    Current password is a required field.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="password" class="form-label fw-bold">New Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter new password" required />
                                <div class="invalid-feedback">
                                    New password is a required field.
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="password_confirmation" class="form-label fw-bold">Confirm New Password <span class="text-danger">*</span></label>
                                <input type="password" placeholder="Enter confirm password" class="form-control" id="password_confirmation" name="password_confirmation" required />
                                <div class="invalid-feedback">
                                    Confirm password is a required field.
                                </div>
                            </div>
                        </div>
                                  
                        <div class="row mt-2">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection