@extends('layouts.admin_app')

@section('style')
@endsection

@section('content')

    @include('layouts.partials.admin._breadcrumb', ['title' => "Details", 'section' => "Customer Support", 'page' => 'Details'])

    @if(session()->has('success'))
        <div class="alert alert-success border-0 alert-dismissible fade show" role="alert">
            <strong>Well done!</strong> {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Alert!</strong>
            <ul class="ps-2 mb-0 ms-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Ticket generated on {{ $ticket->created_at }}</h4>
                        </div>
                        <div class="card-body">
                            @include('pages.admin.support.inc.comment', ['ticket' => $ticket])
                        </div>                     
                    </div>
                       
                    <a href="#">
                        <i class="mdi mdi-reply"></i> Reply
                    </a>

                    @include('pages.admin.support.inc.reply', ['ticket' => $ticket])

                </div><!--end col-->
            
                <div class="col-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h4 class="card-title font-12">{{ $ticket->name }} <span class="fw-lighter">submitted this request</span></h4>
                        </div>
                        <div class="card-body">
                            @include('pages.admin.support.inc.customer_details', ['ticket' => $ticket])
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div><!--end col-->
    </div><!--end row-->

@endsection

@section('script')
    <script src="{{ asset('admin-assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#comment',
            menubar: false,
            statusbar: false,
            readonly: false,
            height: 300,
            plugins: [
                'autolink link image lists charmap preview hr anchor pagebreak',
                'searchreplace visualblocks visualchars fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste'
            ],
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist | ' + 'emoticons',
            // menu: {
            //     favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
            // },
            // menubar: 'favs file edit view insert format tools table help',
            content_style: 'body { font-size:14px }'
        });
    </script>
@endsection