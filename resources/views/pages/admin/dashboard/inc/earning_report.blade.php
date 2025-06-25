<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">                      
                <h4 class="card-title">Earnings Reports (last 7 days)</h4>                      
            </div><!--end col-->                                        
        </div>  <!--end row-->                                  
    </div><!--end card-header-->
    <div class="card-body">
        @if(count($earningReport) > 0)
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-top-0">Date</th>                                                            
                            <th class="border-top-0 text-center">Items Sold</th>
                            <th class="border-top-0">Earnings</th>
                        </tr><!--end tr-->
                    </thead>
                    <tbody>
                        @foreach($earningReport as $key => $earn)
                            @if($key < 5)
                                <tr>                                                        
                                    <td>{{ \Carbon\Carbon::parse($earn->date)->toFormattedDateString() }}</td>                                                            
                                    <td class="text-center">{{ $earn->items_sold }}</td>
                                    <td>{{ 'Rs. ' . $earn->earnings }}</td>
                                </tr><!--end tr-->
                            @endif    
                        @endforeach                             
                    </tbody>
                </table> <!--end table-->                                               
            </div><!--end /div-->
        @else
            <p>No data available!</p>
        @endif
    </div><!--end card-body--> 
</div><!--end card-->