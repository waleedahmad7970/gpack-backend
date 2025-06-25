<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">                      
                <h4 class="card-title">Most Popular Products</h4>                      
            </div><!--end col-->                                        
        </div>  <!--end row-->                                  
    </div><!--end card-header-->
    <div class="card-body">
        @if(count($bestSellingProducts) > 0)
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-top-0">Product</th>
                            <th class="border-top-0">Price</th>
                            <th class="border-top-0 text-center">Total Sold</th>
                            <th class="border-top-0">Status</th>
                        </tr><!--end tr-->
                    </thead>
                    <tbody>
                        @foreach($bestSellingProducts as $key => $prod)
                            @if($key < 5)
                                <tr>                                                        
                                    <td>
                                        <div class="media">
                                            @if(count($prod->images) > 0)
                                                @foreach($prod->images as $img)
                                                    <img 
                                                        src="{{ $img->image_url }}" 
                                                        height="30" 
                                                        class="me-3 align-self-center rounded" 
                                                        alt="{{ $prod->name }}"
                                                    />
                                                    @break
                                                @endforeach
                                            @else
                                                <img
                                                    src="{{ asset('assets/images/default/product_default_image.png') }}"
                                                    alt="{{ $prod->name }}"
                                                    height="30"
                                                    class="me-3 align-self-center rounded"
                                                />
                                            @endif
                                            <div class="media-body align-self-center"> 
                                                <h6 class="m-0">{{ $prod->name }}</h6>
                                                <a href="#" class="font-12 text-primary">{{ $prod->category->name }}</a>                                                                                           
                                            </div><!--end media body-->
                                        </div>
                                    </td>
                                    <td>
                                        @if ($prod->discount_price)
                                            <del class="text-muted font-10">{{ 'Rs. ' . $prod->price }}</del>
                                            <span class="ms-2">{{ 'Rs. ' . $prod->discount_price }}</span>
                                        @else
                                            <span>{{ 'Rs. ' . $prod->price }}</span>
                                        @endif
                                    </td>                                   
                                    <td class="text-center">{{ $prod->total_sold }}</td>
                                    <td><span class="badge badge-soft-warning px-2">Stock</span></td>
                                </tr><!--end tr-->
                            @endif
                        @endforeach                                
                    </tbody>
                </table> <!--end table-->                                               
            </div><!--end /div-->
        @else
            <p>No product found!</p>
        @endif
    </div><!--end card-body--> 
</div><!--end card-->