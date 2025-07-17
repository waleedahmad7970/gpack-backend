@extends('layouts.admin_app')

@section('style')
@endsection

@section('content')

    @include('layouts.partials._breadcrumb', ['title' => "Social Media Links", 'section' => "Settings / Social Media", 'page' => 'List'])

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
                    <h4 class="card-title">Social Media Links</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    @foreach($socials as $social)
                        <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('admin.socials.update', $social->id) }}" novalidate>    
                            @csrf          
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-2">
                                    <input type="text" class="form-control" id="type" name="type" value="{{ $social->platform }}" required disabled />
                                </div>
       
                                <div class="col-6">
                                    <input type="text" class="form-control" id="url" name="url" value="{{ $social->url }}" placeholder="Enter {{ $social->platform }} url" />
                                </div>
        
                                <div class="col-2 pt-2">
                                    <div class="form-check form-switch form-switch-success">
                                        <input 
                                            class="form-check-input" 
                                            name="active" 
                                            type="checkbox" 
                                            id="active" 
                                            {{ $social->is_active == 1 ? "checked" : "" }} 
                                        />
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                </div>
                        
                                <div class="col-2 text-center pt-1">
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection