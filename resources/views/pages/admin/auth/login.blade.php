@extends('layouts.admin_app', ['hideLayout' => true])

@section('content')
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 border-bottom">
                                <div class="text-center p-3">
                                    <a href="{{ url('/') }}" class="logo logo-admin">
                                        <img 
                                            src="{{ asset('admin-assets/images/logos/logo-black.svg') }}" 
                                            height="50" 
                                            alt="Georgia Construction" 
                                            class="auth-logo"
                                        />
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold font-18">Let's Get Started</h4>   
                                    <p class="text-muted  mb-0">Sign in to continue to Admin Panel.</p>  
                                </div>
                            </div>
                            <div class="card-body pt-0">                                    
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger border-0 mt-4 mb-2" role="alert">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                @include('pages.admin.auth.inc.login_form')
                                @include('pages.admin.auth.inc.login_footer')
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end col-->
    </div><!--end row-->
@endsection