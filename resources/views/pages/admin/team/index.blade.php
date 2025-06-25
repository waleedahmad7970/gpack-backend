@extends('layouts.admin_app')

@section('content')

    @include('layouts.partials._breadcrumb', ['title' => "Team Members", 'page' => 'Team Member List'])

    @if(session()->has('success'))
        <div class="alert alert-success border-0 alert-dismissible fade show" role="alert">
            <strong>Well done!</strong> {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @if(count($members) > 0)
            @foreach($members as $member)
                <div class="col-lg-3">
                    <div class="card">                               
                        <div class="card-body text-center">   
                            <div class="text-end">                                                       
                                <a href="{{ route('admin.teams.edit', $member->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                                <form 
                                    action="{{ route('admin.teams.delete', $member->id) }}" 
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
                            <img src="{{ asset($member->photo_url) }}" alt="{{ $member->name }}" class="rounded-circle thumb-xl mt-n3" />
                            <h5 class="font-15">{{ $member->name }}</h5> 
                            <span class="text-muted">{{ $member->designation }}</span>
                            <p class="mt-1 fw-bold">{{ $member->expertise }}</p>
                            @if(count($member->fields) > 0)
                                @foreach($member->fields as $field)
                                    <span class="badge rounded-pill badge-soft-secondary">{{ $field->name }}</span>
                                @endforeach
                            @endif
                        </div><!--end card-body-->                                                                     
                    </div><!--end card-->
                </div><!--end col-->
            @endforeach
        @else
            <div class="col-lg-12">
                <p>No team member found!</p>
            </div>
        @endif                                                   
    </div><!--end row-->

@endsection