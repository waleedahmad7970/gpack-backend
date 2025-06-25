@extends('layouts.admin_app')

@section('style')
@endsection

@section('content')

    @include('layouts.partials.admin._breadcrumb', ['title' => "Admins", 'section' => "Settings / Admins", 'page' => 'List'])

    @if(session()->has('success'))
        <div class="alert alert-success border-0 alert-dismissible fade show" role="alert">
            <strong>Well done!</strong> {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title">Admins </h4>
                        </div>
                        <div class="col-md-6 text-end pt-1">
                            <a href="{{ route('admin.admins.create') }}">
                                <button type="button" class="btn btn-primary">
                                    <i class="mdi mdi-plus me-2"></i>
                                    Add Admin
                                </button>
                            </a>
                        </div>
                    </div>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="row">
                        @foreach($admins as $key => $admin)
                            <div class="col-lg-4">
                                <div class="card">                                                            
                                    <div class="card-body text-center">  
                                        <div class="text-end">                                                       
                                            <a href="{{ route('admin.admins.edit', $admin->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                                            <!-- <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a> -->
                                             <form 
                                                action="{{ route('admin.admins.delete', $admin->id) }}" 
                                                method="post"
                                                onsubmit="return confirm('Are you sure?');"
                                                class="d-inline"
                                            >                             
                                                @csrf
                                                @method('delete')

                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="las la-trash-alt text-secondary font-16"></i>
                                                </button>
                                            </form>
                                        </div>                                    
                                        <img 
                                            src="{{ empty($admin->photo) ? asset('admin-assets/images/users/user-vector.png') : asset($admin->photo) }}" 
                                            alt="{{ $admin->name }}" 
                                            height="100" 
                                            width="100"
                                            class="rounded-circle mt-n3"
                                        />
                                        <h5 class="mb-1">{{ $admin->name }}</h5> 
                                        <p class="text-center font-12 text-muted">{{ $admin->email }}</p>
                                            
                                        <a href="{{-- route('admins.reset-password.create',  $admin->id) --}}">
                                            <button type="button" class="btn btn-sm btn-de-primary">Reset Password</button>
                                        </a>
                                    </div><!--end card-body-->                                                                     
                                </div><!--end card-->
                            </div><!--end col-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection