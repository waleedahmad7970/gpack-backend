@extends('layouts.admin_app')

@section('style')

<link href="{{ asset('admin-assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />
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

    @include('layouts.partials._breadcrumb', ['title' => "Edit Team Member", 'section' => 'Teams', 'page' => 'Edit'])

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
                    <h4 class="card-title">Edit Team Member</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('admin.teams.update', $member->id) }}" novalidate>    
                        @csrf
                        @method('PUT')          
                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="prefix" class="form-label fw-bold">Prefix <span class="text-danger">*</span></label>
                                <select name="prefix" id="prefix" class="form-select" required>
                                    <option value="{{ $member->prefix }}">{{ $member->prefix }}</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Mx">Mx</option>
                                    <option value="Dr">Dr</option>
                                    <option value="Sir">Sir</option>
                                    <option value="Lady">Lady</option>
                                    <option value="Lord">Lord</option>
                                </select>
                                <div class="invalid-feedback">
                                    Prefix is a required field.
                                </div>
                            </div>
                            <div class="col-10">
                                <label for="name" class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" placeholder="Enter name" required />
                                <div class="invalid-feedback">
                                    Name is a required field.
                                </div>
                            </div>
                        </div>      
                        <div class="row my-3">
                            <div class="col-6">
                                <label for="designation" class="form-label fw-bold">Designation <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="designation" name="designation" value="{{ $member->designation }}" placeholder="Enter designation" required />
                                <small class="form-text text-muted">e.g. Technical Director, Program Manager etc</small>
                                <div class="invalid-feedback">
                                    Designation is a required field.
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="expertise" class="form-label fw-bold">Expertise </label>
                                <input type="text" class="form-control" id="expertise" name="expertise" value="{{ $member->expertise }}" placeholder="Enter expertise" />
                                <small class="form-text text-muted">e.g. Policy Design Expert, Implementation Lead etc</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="my-2 form-label fw-bold">Member Type <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="member_type" id="core" value="core" {{ $member->member_type == "core" ? "checked" : "" }} />
                                    <label class="form-check-label" for="core">
                                        Core Member
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="member_type" id="fellow" value="fellow" {{ $member->member_type == "fellow" ? "checked" : "" }} />
                                    <label class="form-check-label" for="fellow">
                                        Fellow Member
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label fw-bold">Fields <span class="text-danger">*</span></label>
                                <select name="fields[]" id="multiSelect">
                                    @foreach($fields as $key => $field)
                                        <option value="{{ $field->id }}">{{ $field->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="profile_url" class="form-label fw-bold">Profile URL</label>
                                <input type="text" class="form-control" id="profile_url" name="profile_url" value="{{ $member->profile_url }}" placeholder="Enter profile url" />
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="images" class="form-label fw-bold">Profile Image</label>
                                <div class="input-images-1"></div>
                                <small class="form-text text-muted">Max 1 image allowed, each image should not exceed 2MB</small>
                                <div class="invalid-feedback">
                                    Profile image is a required field.
                                </div>
                            </div>
                        </div>

                        @if(isset($member->photo_url))
                            <div class="row" id="photo_url">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="media">
                                                        <img 
                                                            class="d-flex align-self-center me-3 thumb-lg rounded object-fit-cover" 
                                                            src="{{ asset($member->photo_url) }}" 
                                                            alt="{{ $member->name }}"
                                                        />
                                                        <div class="media-body align-self-center">
                                                            <h4 class="mt-0 mb-1 font-14">{{ $member->photo_url }}</h4>                                                    
                                                        </div><!--end media-body-->
                                                    </div><!--end media-->
                                                </div><!--end col-->
                                                <div class="col-sm-2 align-self-center">
                                                    <div class="text-end">
                                                        <a 
                                                            href="javascript:;" 
                                                            onclick="deleteImage({{ $member->id }})"
                                                        >
                                                            <i class="las la-trash-alt text-secondary font-18"></i>
                                                        </a>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div>
                            </div>                        
                        @endif

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-check form-switch form-switch-success">
                                    <input 
                                        class="form-check-input" 
                                        name="active" 
                                        type="checkbox" 
                                        id="active" 
                                        {{ $member->is_active == 1 ? 'checked' : '' }} 
                                    />
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>          
                        <div class="row mt-2">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Update Team Member</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

<script src="{{ asset('admin-assets/plugins/select/selectr.min.js') }}"></script>
<script>

    let selectedfieldIds = "{{ $selectedfieldIds }}";
    let selectedfieldIdss = JSON.parse(selectedfieldIds.replace(/&quot;/g, '"'));
    
    const selectr = new Selectr('#multiSelect',{
        multiple: true,
        placeholder: 'Select field(s)...',
      //  data: defaultMembers
    });

    selectr.setValue(selectedfieldIdss)

</script>

<script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/image-uploader/src/image-uploader.js') }}"></script>
<script>
    
    $(function () {
        $('.input-images-1').imageUploader({
            imagesInputName: 'profile_image',
            maxFiles: 1,
            extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
            maxSize: 2 * 1024 * 1024
        });
    });

</script>

<script src="{{ asset('admin-assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script>

    function deleteImage(teamId)
    {
        let csrf = "{{ csrf_token() }}";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then(function(result) {
            if (result.isConfirmed) {
                fetch(`/team-image/${teamId}`, {
                    method: 'DELETE',
                    headers: {
                        "X-CSRF-Token": csrf,
                        "Content-Type": "application/json"
                    }
                })
                .then(res => res.json())
                .then(data => { 
                    document.getElementById('photo_url').style.display = 'none';
                    Swal.fire(
                        'Deleted!',
                        data.message,
                        data.success ? 'success' : 'error'
                    )
                })
                .catch(error => console.log(error))   
            }
        })
    }
</script>

@endsection