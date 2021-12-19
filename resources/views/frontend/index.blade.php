@extends('frontend.main_master')

@section('title')
    E-commerce
@endsection

@section('content')

  <div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">

      <div class="row"> 

        <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 

          @include('frontend.common.category')

          @include('frontend.common.hot_deals')
          
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Offer</h3>

            <div class="sidebar-widget-body outer-top-xs">

              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                <div class="item">
                  <div class="products special-product">
                    
                    @foreach ($special_offers as $special_offer)
                      <div class="product">
                        <div class="product-micro">
                          <div class="row product-micro-row">
                            <div class="col col-xs-5">
                              <div class="product-image">
                                <div class="image"> 
                                  <a href="{{ route('product.details', $special_offer->id) }}"> 
                                    <img src="{{ asset($special_offer->thumbnail)}}" alt=""> 
                                  </a> 
                                </div>
                              </div>
                            </div>
                            <div class="col col-xs-7">
                              <div class="product-info">
                                <h3 class="name">
                                  <a href="{{ route('product.details', $special_offer->id) }}">
                                    {{ $special_offer->name }}
                                  </a>
                                </h3>
                                <div class="rating rateit-small"></div>
                                <div class="product-price"> 
                                  <span class="price"> ${{ $special_offer->price }} </span> 
                                </div>
                              </div>
                            </div>
                          </div> 
                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>

              </div>

            </div>
            
          </div>

          @include('frontend.common.tags')

          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Deals</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                <div class="item">
                  <div class="products special-product">

                    @foreach ($special_deals as $special_deal)
                        
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">

                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> 
                                <a href="{{ route('product.details', $special_deal->id) }}"> 
                                  <img src="{{ asset($special_deal->thumbnail) }}"> 
                                </a> 
                              </div>
                            </div>
                          </div>

                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name">
                                <a href="{{ route('product.details', $special_deal->id) }}">
                                  {{ $special_deal->name }}
                                </a>
                              </h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> 
                                <span class="price"> ${{ $special_deal->price }} </span> 
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    @endforeach
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
          
          <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                @foreach($sliders as $slider)
                <div class="item" style="background-image: url({{ asset($slider->image) }});">
                  <div class="container-fluid">
                    <div class="caption bg-color vertical-center text-left">
                      
                      <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
                      <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
                      <div class="button-holder fadeInDown-3"> 
                        <a href="{{ route('shop.page') }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">
                          Shop Now
                        </a> 
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

            </div>
          </div>

          <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
              <div class="row">

                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">money back</h4>
                      </div>
                    </div>
                    <h6 class="text">30 Days Money Back Guarantee</h6>
                  </div>
                </div>
                
                <div class="hidden-md col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">free shipping</h4>
                      </div>
                    </div>
                    <h6 class="text">Shipping on orders over $99</h6>
                  </div>
                </div>
                
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">Special Sale</h4>
                      </div>
                    </div>
                    <h6 class="text">Extra $5 off on all items </h6>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">

            <div class="more-info-tab clearfix">
              <h3 class="new-product-title pull-left">New Products</h3>
              <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                <li class="active">
                  <a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a>
                </li>
                @foreach ($categories as $category)
                  <li>
                    <a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">
                      {{ $category->name }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>

            <div class="tab-content outer-top-xs">

              <div class="tab-pane in active" id="all">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    
                    @foreach ($products as $product)
                      <div class="item item-carousel">
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

                              @if ($product->discount == NULL)
                                <div class="tag new">
                                  <span>new</span>
                                </div>
                              @else
                                <div class="tag hot">
                                  <span>{{ round($discount) }}%</span>
                                </div>
                              @endif

                            </div>
                            
                            <div class="product-info text-left">

                              <h3 class="name">
                                <a href="detail.html">
                                  {{ $product->name }}
                                </a>
                              </h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              @if ($product->price == NULL)
                                <div class="product-price"> 
                                  <span class="price"> 
                                    ${{ $product->price }} 
                                  </span>
                                </div>                             
                              @else 
                                <div class="product-price"> 
                                  <span class="price">
                                    $ {{ $product->discount }} 
                                  </span> 
                                  <span class="price-before-discount">
                                    ${{ $product->price }} 
                                  </span> 
                                </div>   
                              @endif
                              
                            </div>

                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" onclick="productReview(this.id)" id="{{ $product->id }}"> 
                                      <i class="fa fa-shopping-cart"></i> 
                                    </button>
                                    <button class="btn btn-primary cart-btn" type="button">
                                      Add to cart
                                    </button>
                                  </li>
                                    <button class="btn btn-primary icon" type="button" title="Wishlist" onclick="addToWishlist(this.id)" id="{{ $product->id }}"> 
                                      <i class="icon fa fa-heart"></i>
                                    </button>
                                  <li class="lnk"> 
                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> 
                                      <i class="fa fa-signal" aria-hidden="true"></i> 
                                    </a> 
                                  </li>
                                </ul>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>
              </div>

              @foreach ($categories as $category)

                <div class="tab-pane" id="category{{ $category->id }}">
                  <div class="product-slider">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                      
                      @php
                          $catwiseproducts = App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
                      @endphp

                      @forelse ($catwiseproducts as $catwiseproduct)
                        <div class="item item-carousel">
                          <div class="products">
                            <div class="product">

                            <div class="product-image">

                              <div class="image"> 
                                <a href="detail.html">
                                  <img  src="{{ asset($catwiseproduct->thumbnail) }}" alt="">
                                </a> 
                              </div>
                              
                              @php
                                  $amount = $product->price - $product->discount;
                                  $discount = ($amount / $product->price) * 100;
                              @endphp

                              @if ($catwiseproduct->discount == NULL)
                                <div class="tag new">
                                  <span>new</span>
                                </div>
                              @else
                                <div class="tag hot">
                                  <span>{{ round($discount) }}%</span>
                                </div>
                              @endif

                            </div>
                              
                              <div class="product-info text-left">
                                
                                <h3 class="name">
                                  <a href="detail.html">
                                    {{ $product->name }}
                                  </a>
                                </h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                @if ($catwiseproduct->price == NULL)
                                  <div class="product-price"> 
                                    <span class="price"> 
                                      ${{ $catwiseproduct->price }} 
                                    </span>
                                  </div>                             
                                @else 
                                  <div class="product-price"> 
                                    <span class="price"> 
                                      $ {{ $catwiseproduct->discount }}
                                    </span> 
                                    <span class="price-before-discount">                                    
                                      ${{ $catwiseproduct->price }} 
                                    </span> 
                                  </div>   
                                @endif
                                
                              </div>

                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" onclick="productReview(this.id)" id="{{ $product->id }}"> 
                                      <i class="fa fa-shopping-cart"></i> 
                                    </button>
                                    <button class="btn btn-primary cart-btn" type="button">
                                      Add to cart
                                    </button>
                                  </li>
                                    <button class="btn btn-primary icon" type="button" title="Wishlist" onclick="addToWishlist(this.id)" id="{{ $product->id }}"> 
                                      <i class="icon fa fa-heart"></i>
                                    </button>
                                    <li class="lnk"> 
                                      <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> 
                                        <i class="fa fa-signal" aria-hidden="true"></i> 
                                      </a> 
                                    </li>
                                  </ul>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      @empty
                        <h5 class="text-danger">No Product Found</h5>
                      @endforelse

                    </div>
                  </div>
                </div>

              @endforeach

            </div>

          </div>

          <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">

              <div class="col-md-7 col-sm-7">
                <div class="wide-banner cnt-strip">
                  <div class="image">
                    <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt="">
                  </div>
                </div>
              </div>
              <div class="col-md-5 col-sm-5">
                <div class="wide-banner cnt-strip">
                  <div class="image"> 
                    <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt="">
                  </div>
                </div>
              </div>

            </div>
          </div>
          
          <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">Featured products</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
              
                    @foreach ($features as $feature)
                      <div class="item item-carousel">
                        <div class="products">
                          <div class="product">

                            <div class="product-image">

                              <div class="image"> 
                                <a href="{{ route('product.details', $feature->id) }}">
                                  <img  src="{{ asset($feature->thumbnail) }}" alt="">
                                </a> 
                              </div>
                              
                              @php
                                  $amount = $feature->price - $feature->discount;
                                  $discount = ($amount / $feature->price) * 100;
                              @endphp

                              @if ($feature->discount == NULL)
                                <div class="tag new">
                                  <span>new</span>
                                </div>
                              @else
                                <div class="tag hot">
                                  <span>{{ round($discount) }}%</span>
                                </div>
                              @endif

                            </div>
                            
                            <div class="product-info text-left">

                              <h3 class="name">
                                <a href="detail.html">
                                  {{ $feature->name }}
                                </a>
                              </h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              @if ($feature->price == NULL)
                                <div class="product-price"> 
                                  <span class="price"> 
                                    ${{ $feature->price }} 
                                  </span>
                                </div>                             
                              @else 
                                <div class="product-price"> 
                                  <span class="price"> 
                                    $ {{ $feature->discount }}
                                  </span> 
                                  <span class="price-before-discount">
                                    ${{ $feature->price }}     
                                  </span> 
                                </div>   
                              @endif
                              
                            </div>

                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" onclick="productReview(this.id)" id="{{ $feature->id }}"> 
                                      <i class="fa fa-shopping-cart"></i> 
                                    </button>
                                    <button class="btn btn-primary cart-btn" type="button">
                                      Add to cart
                                    </button>
                                  </li>
                                    <button class="btn btn-primary icon" type="button" title="Wishlist" onclick="addToWishlist(this.id)" id="{{ $feature->id }}"> 
                                      <i class="icon fa fa-heart"></i>
                                    </button>
                                  <li class="lnk"> 
                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> 
                                      <i class="fa fa-signal" aria-hidden="true"></i> 
                                    </a> 
                                  </li>
                                </ul>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    @endforeach

            </div> 
          </section>

          <section class="section fashion-product wow fadeInUp">
            <h3 class="section-title">Fashion</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
              
                    @foreach ($fashions as $fashion)
                      <div class="item item-carousel">
                        <div class="products">
                          <div class="product">

                            <div class="product-image">

                              <div class="image"> 
                                <a href="{{ route('product.details', $fashion->id) }}">
                                  <img  src="{{ asset($fashion->thumbnail) }}" alt="">
                                </a> 
                              </div>
                              
                              @php
                                  $amount = $fashion->price - $fashion->discount;
                                  $discount = ($amount / $fashion->price) * 100;
                              @endphp

                              @if ($fashion->discount == NULL)
                                <div class="tag new">
                                  <span>new</span>
                                </div>
                              @else
                                <div class="tag hot">
                                  <span>{{ round($discount) }}%</span>
                                </div>
                              @endif

                            </div>
                            
                            <div class="product-info text-left">

                              <h3 class="name">
                                <a href="detail.html">
                                  {{ $fashion->name }}
                                </a>
                              </h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              @if ($fashion->price == NULL)
                                <div class="product-price"> 
                                  <span class="price"> 
                                    ${{ $fashion->price }} 
                                  </span>
                                </div>                             
                              @else 
                                <div class="product-price"> 
                                  <span class="price"> 
                                    $ {{ $fashion->discount }}
                                  </span> 
                                  <span class="price-before-discount">
                                    ${{ $fashion->price }}     
                                  </span> 
                                </div>   
                              @endif
                              
                            </div>

                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" onclick="productReview(this.id)" id="{{ $fashion->id }}"> 
                                      <i class="fa fa-shopping-cart"></i> 
                                    </button>
                                  </li>
                                    <button class="btn btn-primary icon" type="button" title="Wishlist" onclick="addToWishlist(this.id)" id="{{ $fashion->id }}"> 
                                      <i class="icon fa fa-heart"></i>
                                    </button>
                                  <li class="lnk"> 
                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> 
                                      <i class="fa fa-signal" aria-hidden="true"></i> 
                                    </a> 
                                  </li>
                                </ul>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    @endforeach

            </div> 
          </section>

          <section class="section electronic-product wow fadeInUp">
            <h3 class="section-title">Electronics</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
              
                    @foreach ($electronics as $electronic)
                      <div class="item item-carousel">
                        <div class="products">
                          <div class="product">

                            <div class="product-image">

                              <div class="image"> 
                                <a href="{{ route('product.details', $electronic->id) }}">
                                  <img  src="{{ asset($electronic->thumbnail) }}" alt="">
                                </a> 
                              </div>
                              
                              @php
                                  $amount = $electronic->price - $electronic->discount;
                                  $discount = ($amount / $electronic->price) * 100;
                              @endphp

                              @if ($electronic->discount == NULL)
                                <div class="tag new">
                                  <span>new</span>
                                </div>
                              @else
                                <div class="tag hot">
                                  <span>{{ round($discount) }}%</span>
                                </div>
                              @endif

                            </div>
                            
                            <div class="product-info text-left">

                              <h3 class="name">
                                <a href="detail.html">
                                  {{ $electronic->name }}
                                </a>
                              </h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              @if ($electronic->price == NULL)
                                <div class="product-price"> 
                                  <span class="price"> 
                                    ${{ $electronic->price }} 
                                  </span>
                                </div>                             
                              @else 
                                <div class="product-price"> 
                                  <span class="price"> 
                                    $ {{ $electronic->discount }}
                                  </span> 
                                  <span class="price-before-discount">
                                    ${{ $electronic->price }}     
                                  </span> 
                                </div>   
                              @endif
                              
                            </div>

                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" onclick="productReview(this.id)" id="{{ $electronic->id }}"> 
                                      <i class="fa fa-shopping-cart"></i> 
                                    </button>
                                  </li>
                                    <button class="btn btn-primary icon" type="button" title="Wishlist" onclick="addToWishlist(this.id)" id="{{ $electronic->id }}"> 
                                      <i class="icon fa fa-heart"></i>
                                    </button>
                                  <li class="lnk"> 
                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> 
                                      <i class="fa fa-signal" aria-hidden="true"></i> 
                                    </a> 
                                  </li>
                                </ul>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    @endforeach

            </div> 
          </section>

          <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-12">
                <div class="wide-banner cnt-strip">
                  <div class="image"> 
                    <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt=""> 
                  </div>
                  <div class="strip strip-text">
                    <div class="strip-inner">
                      <h2 class="text-right">New Mens Fashion<br>
                        <span class="shopping-needs">Save up to 40% off</span></h2>
                    </div>
                  </div>
                  <div class="new-label">
                    <div class="text">NEW</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">latest form blog</h3>
            <div class="blog-slider-container outer-top-xs">
              <div class="owl-carousel blog-slider custom-carousel">
                @foreach ($blogs as $blog)
                  <div class="item">
                    <div class="blog-post">

                      <div class="blog-post-image">
                        <div class="image">
                          <a href="{{ route('blog.detail', $blog->slug) }}">
                            <img src="{{ asset($blog->image) }}" alt="">
                            </a> 
                        </div>
                      </div>
                      
                      <div class="blog-post-info text-left">
                        <h3 class="name">
                          <a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                        </h3>
                        <span class="info">
                          {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }} 
                        </span>
                        <p class="text">
                          {!! Str::limit($blog->description, 100 )  !!}
                        </p>
                        <a href="{{ route('blog.detail', $blog->slug) }}" class="lnk btn btn-primary">Read more</a> 
                      </div>

                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </section>

        </div>

      </div>
      
    </div>
  </div>
    
@endsection