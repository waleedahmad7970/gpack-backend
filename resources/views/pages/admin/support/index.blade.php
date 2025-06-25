@extends('layouts.admin_app')

@section('style')

    <style>
        .tabulator .tabulator-table .tabulator-cell {
            overflow: unset !important;
        } 
    </style>

@endsection

@section('content')

    @include('layouts.partials.admin._breadcrumb', ['title' => "New Messages", 'section' => "Support", 'page' => 'New'])

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
                    <h4 class="card-title">Message List</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable-support"></div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@section('script')
    <script src="{{ asset('admin-assets/plugins/tabulator/tabulator.min.js') }}"></script>
    <script>
        let table = new Tabulator("#datatable-support", {
            ajaxURL:"/admin/getNewMessages",
            layout:"fitColumns",      //fit columns to width of table
            responsiveLayout:"collapse",  //hide columns that dont fit on the table
            pagination:"local",       //paginate the data
            paginationSize:10,         //allow 7 rows per page of data
            placeholder:"<h6>No Data Available</h6>",
            columns:[                 //define the table columns
                {title: '#', hozAlign:"left", vertAlign:"middle", width:70, formatter:"rownum"},
                {title: "User", field: "user", headerFilter: "input", vertAlign:"middle", widthGrow:2},
                {title: "Subject", field: "subject", headerFilter: "input", vertAlign:"middle", widthGrow:4},
                {title: "Status",  field: "status", hozAlign:"left", vertAlign:"middle", widthGrow:1, formatter:function(cell, formatterParams){
                    if(cell.getValue() === 0) {
                        return '<span class="badge bg-warning">Unread</span>';
                    } else {
                        return '<span class="badge bg-success">Read</span>';
                    }
                }},
                {title:"Date", field:"date", hozAlign:"left", vertAlign:"middle", widthGrow:1},
                {title: "Action", field: "details", vertAlign:"middle", widthGrow:1, formatter:function(cell, formatterParams){
                    return `<a href="/admin/support/${cell.getValue()}"><button class="btn btn-primary btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Details</button><a>`;
                }}
            ],
        });
    </script>
@endsection