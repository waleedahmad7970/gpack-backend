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

    @include('layouts.partials._breadcrumb', ['title' => 'Why Us', 'section' => 'Pages', 'page' => 'Why Us'])

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
            <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{ route('admin.pages.why.update', $whyPage->id) }}" novalidate>    
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Hero/Banner Section</h4>
                    </div><!--end card-header-->
                    <div class="card-body">    
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="ceo_name" class="form-label fw-bold">CEO Name <span class="text-danger">*</span></label>
                                <input type="text" name="ceo_name" id="ceo_name" value="{{ $whyPage->ceo_name }}" class="form-control" required />
                                <div class="invalid-feedback">
                                    CEO Name is a required field.
                                </div>
                            </div>
                        </div>      
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="ceo_message" class="form-label fw-bold">CEO Message <span class="text-danger">*</span></label>
                                <textarea class="form-control tinymce_editor" id="ceo_message" name="ceo_message" rows="4" required>{{ $whyPage->ceo_message }}</textarea>
                                <div class="invalid-feedback">
                                    CEO Message is a required field.
                                </div>
                            </div>
                        </div>       
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="images" class="form-label fw-bold">CEO Image <span class="text-danger">*</span></label>
                                <div class="input-images-1"></div>
                                <small class="form-text text-muted">Max 1 image allowed, each image should not exceed 2MB</small>
                                <div class="invalid-feedback">
                                    CEO image is a required field.
                                </div>
                            </div>
                        </div>
                        @if(isset($whyPage->ceo_image_url))
                            <div class="row" id="photo_url">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="media">
                                                        <img 
                                                            class="d-flex align-self-center me-3 thumb-lg rounded object-fit-cover" 
                                                            src="{{ asset($whyPage->ceo_image_url) }}" 
                                                            alt="GPACK"
                                                        />
                                                        <div class="media-body align-self-center">
                                                            <h4 class="mt-0 mb-1 font-14">{{ $whyPage->ceo_image_url }}</h4>                                                    
                                                        </div><!--end media-body-->
                                                    </div><!--end media-->
                                                </div><!--end col-->
                                                <div class="col-sm-2 align-self-center">
                                                    <div class="text-end">
                                                        <a 
                                                            href="javascript:;" 
                                                            onclick="deleteImage({{ $whyPage->id }})"
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
                    </div>
                </div>
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

<script src="{{ asset('admin-assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '.tinymce_editor',
        menubar: false,
        statusbar: false,
        readonly: false,
        height: 450,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' + ' | link image | ' +
            'bullist numlist | ' + 'emoticons',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>

<script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/image-uploader/src/image-uploader.js') }}"></script>
<script>
    
    $(function () {
        $('.input-images-1').imageUploader({
            imagesInputName: 'ceo_image',
            maxFiles: 1,
            extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg', '.webp'],
            maxSize: 2 * 1024 * 1024
        });
    });
</script>

<script src="{{ asset('admin-assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script>

    function deleteImage(whyPageId)
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
                fetch(`/pages/whyus-image/${whyPageId}`, {
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