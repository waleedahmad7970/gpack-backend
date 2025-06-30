@extends('layouts.admin_app')

@section('style')

<link href="{{ asset('admin-assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    @include('layouts.partials._breadcrumb', ['title' => 'Publications', 'section' => 'Pages', 'page' => 'Publications'])

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
            <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('admin.pages.publication.update', $publicationPage->id) }}" novalidate>    
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Publication Section</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label fw-bold">Publications <span class="text-danger">*</span></label>
                                <select name="publications[]" id="multiSelect">
                                    @foreach($publications as $key => $pub)
                                        <option value="{{ $pub->id }}">{{ $pub->title }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Select publications that has to be shown on publications page</small>
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
    
    let selectedPublicationIds = "{{ $selectedPublicationIds }}";
    let selectedPublicationIdss = JSON.parse(selectedPublicationIds.replace(/&quot;/g, '"'));

    const selectr = new Selectr('#multiSelect',{
        multiple: true,
        placeholder: 'Select publication(s)...',
    });

    selectr.setValue(selectedPublicationIdss)

</script>


@endsection