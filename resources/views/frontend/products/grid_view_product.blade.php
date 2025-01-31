@foreach ($products as $product)
                                            
    <div class="col-sm-6 col-md-4 wow fadeInUp">
        <div class="products">
            <div class="product">

                <div class="product-image">

                    <div class="image"> 
                        <a href="{{ route('product.details', $product->id) }}">
                            <img  src="{{ asset($product->thumbnail) }}" alt="">
                        </a> 
                    </div>
                                                            
                    @php
                        $amount = $product->price - $product->discount;
                        $discount = ($amount / $product->price) * 100;
                    @endphp

                    @if ($product->price == NULL)
                        <div class="tag new"><span>new</span></div>
                    @else    
                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif

                </div>
                                                        
                <div class="product-info text-left">
                    <h3 class="name">
                        <a href="{{ route('product.details', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if ($product->discount == NULL)
                        <div class="product-price">  
                            <span class="price">
                                $ {{ $product->price }}
                            </span> 
                        </div>
                    @else
                        <div class="product-price">  
                            <span class="price">
                                $ {{ $product->discount }}
                            </span> 
                            <span class="price-before-discount">
                                $ {{ $product->price }}
                            </span>
                        </div> 
                    @endif

                </div>

                <div class="cart clearfix animate-effect">

                    <div class="action">
                        <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endforeach