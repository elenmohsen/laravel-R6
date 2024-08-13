<section class="featured-product section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12 text-center">
                            <h2 class="mb-5">Featured Products</h2>
                        </div>
                         @foreach($products as $product)
                        <div class="col-lg-4 col-12 mb-3">
                          
                            <div class="product-thumb">
                                <a href="{{route('product.index')}}">
                                    <img src="{{asset('assets/images/product/'.$product->image) }}" class="img-fluid product-image" alt="" style="width: 400px; height:300px;">
                                </a>
                                 
                                <div class="product-top d-flex">
                                     @if($product['status']=='none')  
                                        <span class="product-alert me-auto" style="display:none;"></span>
                                        <a href="#" class="bi-heart-fill product-icon" style="text-align:end; margin-left:280px;"></a>
                                        @else 
                                        <span class="product-alert me-auto"> {{$product['status']}}</span>
                                        <a href="#" class="bi-heart-fill product-icon" style="text-align:end; margin-right:10px;"></a>
                                    @endif
                                    
                                </div>

                                <div class="product-info d-flex">
                                   
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="{{route('product.index')}}" class="product-title-link">{{$product['title']}}</a>
                                        </h5>

                                        <p class="product-p">{{$product['description']}}</p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5">${{$product['price']}}</small>
                                </div>
                                
                            </div>
                            
                        </div>
                        @endforeach

                        <div class="col-12 text-center">
                            <a href="products.html" class="view-all">View All Products</a>
                        </div>

                    </div>
                </div>
            </section>