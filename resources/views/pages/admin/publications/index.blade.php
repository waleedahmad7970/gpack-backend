@extends('layouts.admin_app')

@section('style')
@endsection

@section('content')

    @include('layouts.partials._breadcrumb', ['title' => 'Publications List', 'section' => 'Publications', 'page' => 'List'])

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
                    <div class="row align-items-center">
                        <div class="col-6">                      
                            <h4 class="card-title">Publications List</h4>             
                        </div><!--end col-->
                        <div class="col-6 text-end">      
                            <a href="{{ route('admin.publications.create') }}">                
                                <button class="btn btn-sm btn-primary">Add New</button>             
                            </a>
                        </div><!--end col-->                                       
                    </div>  <!--end row-->                                  
                </div><!--end card-header-->
                <div class="card-body">       
                    @if(count($publications) > 0)                             
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr><!--end tr-->
                                </thead>
                                <tbody>
                                    @foreach($publications as $key => $pub)
                                        <tr>
                                            <td style="width: 5%">{{ $key + 1 }}</td>
                                            <td style="width: 45%">{{ $pub->title }}</td>
                                            <td style="width: 40%">
                                                @if($pub->type == 'book')
                                                    <span class="badge bg-soft-primary">Book</span>
                                                @elseif($pub->type == 'chapter')
                                                    <span class="badge bg-soft-danger">Chapter</span>
                                                @else
                                                    <span class="badge bg-soft-success">Assignment</span>
                                                @endif
                                            </td>
                                            <td style="width: 10%">                                                       
                                                <a href="{{ route('admin.publications.edit', $pub->id) }}">
                                                    <i class="las la-pen text-secondary font-16"></i>
                                                </a>
                                                <form 
                                                    action="{{ route('admin.publications.delete', $pub->id) }}" 
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
                                            </td>
                                        </tr><!--end tr-->
                                    @endforeach                                                
                                </tbody>
                            </table>                    
                        </div>            
                    @else
                        <p class="text-center">No publications data found!</p>
                    @endif                           
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col-->                               
    </div><!--end row-->

@endsection