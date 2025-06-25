@extends('layouts.admin_app')

@section('content')

    @include('layouts.partials._breadcrumb', ['title' => "Dashboard", 'page' => 'Dashboard'])

    <div class="row">
        <div class="col-lg-8">
            {{-- @include('pages.admin.dashboard.inc.sales_graph') --}}  
        </div><!-- end col--> 
        <div class="col-lg-4">
          {{--  @include('pages.admin.dashboard.inc.total_sales_box', ['total_sales' => $stats['total_sales']]) --}}
            <div class="row">
                <div class="col-12 col-lg-6"> 
              {{--      @include('pages.admin.dashboard.inc.stats_box', ['text' => 'Today\'s Sales', 'stats' => $stats['today_sales'], 'is_currency' => true]) --}}
                </div><!--end col-->
                <div class="col-12 col-lg-6"> 
                  {{--  @include('pages.admin.dashboard.inc.stats_box', ['text' => 'Today\'s Orders', 'stats' => $stats['today_orders'], 'is_currency' => false]) --}}                    
                </div><!--end col-->
                <div class="col-12 col-lg-6"> 
                  {{--  @include('pages.admin.dashboard.inc.stats_box', ['text' => 'Total Orders', 'stats' => $stats['total_orders'], 'is_currency' => false]) --}}                    
                </div><!--end col-->
                <div class="col-12 col-lg-6"> 
                                         
                </div><!--end col-->                                
            </div><!--end row-->  
          {{--  @include('pages.admin.dashboard.inc.invoices_form')  --}}                                        
        </div><!-- end col-->                                     
    </div><!--end row-->

    <div class="row">
        <div class="col-lg-6">
           {{-- @include('pages.admin.dashboard.inc.earning_report', ['earningReport' => $earningReport]) --}}
        </div> <!--end col-->   
        <div class="col-lg-6">
            {{-- @include('pages.admin.dashboard.inc.popular_products', ['bestSellingProducts' => $bestSellingProducts]) --}}
        </div> <!--end col-->                                                   
    </div><!--end row-->
@endsection

@section('script')
@endsection