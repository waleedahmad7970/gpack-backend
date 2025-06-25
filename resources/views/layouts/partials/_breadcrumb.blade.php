<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">G-Pack</a></li>
                    @if(isset($section))
                        <li class="breadcrumb-item"><a href="#">{{ $section }}</a></li>
                    @endif
                    <li class="breadcrumb-item active">{{ $page }}</li>
                </ol>
            </div>
            <h4 class="page-title">{{ $title }}</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->