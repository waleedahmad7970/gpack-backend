@extends('layouts.admin_app')

@section('style')

<link href="{{ asset('admin-assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    @include('layouts.partials._breadcrumb', ['title' => 'About Us', 'section' => 'Pages', 'page' => 'About Us'])

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
            <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('admin.pages.about.update', $aboutPage->id) }}" novalidate>    
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Team Member Section</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label fw-bold">Team Members <span class="text-danger">*</span></label>
                                <select name="teams[]" id="multiSelect">
                                    @foreach($teamMembers as $key => $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Select team members that has to be shown on home page in teams section</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Update Section</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')

<script src="{{ asset('admin-assets/plugins/select/selectr.min.js') }}"></script>
<script>
    
    let selectedTeamIds = "{{ $selectedTeamIds }}";
    let selectedTeamIdss = JSON.parse(selectedTeamIds.replace(/&quot;/g, '"'));

    const selectr = new Selectr('#multiSelect',{
        multiple: true,
        placeholder: 'Select team members(s)...',
    });

    selectr.setValue(selectedTeamIdss)

</script>

@endsection