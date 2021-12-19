<header class="header-style-1"> 
  
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">

        <div class="cnt-account">
          <ul class="list-unstyled">
            <li>
              <a href="{{ url('user/wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a>
            </li>
            <li>
              <a href="{{ url('/cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a>
            </li>
            <li>
              <a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a>
            </li>
            <li>
              <a href="" type="button" data-toggle="modal" data-target="#ordertraking">
                <i class="icon fa fa-truck"></i>Order Traking
              </a>
            </li>            
            @auth
              <li><a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>Profile</a></li>              
            @else
              <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login</a></li>    
            @endauth
          </ul>
        </div>

        <div class="clearfix"></div>

      </div>
    </div>
  </div>

  <div class="main-header">
    <div class="container">
      <div class="row">

        @php
            $setting = App\Models\SiteSetting::find(1);
        @endphp

        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <div class="logo"> 
            <a href="/"> 
              <img src="{{ asset($setting->logo) }}" alt="logo"> 
            </a> 
          </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <div class="search-area">
            <form method="POST" action="{{ route('product.search') }}">
              @csrf
              <div class="control-group">
                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()" id="search" name="search" placeholder="Search here..." />
                <button class="search-button" type="submit" ></button> 
              </div>
            </form>
             <div id="searchProducts"></div>
          </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <div class="dropdown dropdown-cart"> 
            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count">
                  <span class="count" id="cartQty"></span>
                </div>
                <div class="total-price-basket"> 
                  <span class="lbl">cart -</span> 
                  <span class="total-price"> 
                    <span class="sign">$</span>
                    <span class="value" id="cartSubTotal"></span> 
                  </span> 
                </div>
              </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div id="miniCart">

                </div>
                <div class="clearfix cart-total">
                  <div class="pull-right"> 
                    <span class="text">Sub Total :</span>
                    <span class='price' id="cartSubTotal"></span> 
                  </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">
                    Checkout
                  </a> 
                </div> 
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
          <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> 
                  <a href="/" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                    Home
                  </a> 
                </li>

                @php
                    $categories = App\Models\Category::latest()->get();
                @endphp

                @foreach ($categories as $category)
                  <li class="dropdown yamm mega-menu"> 
                    <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                      {{ $category->name }}
                    </a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">

                            @php
                                $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('name', 'ASC')->get();
                            @endphp

                            @foreach ($subcategories as $subcategory)

                              <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                <a href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->slug) }}">
                                  <h2 class="title">{{ $subcategory->name }}</h2>
                                </a>

                                  @php
                                    $subsubcategories = App\Models\SubSubcategory::where('subcategory_id', $subcategory->id)->orderBy('name', 'ASC')->get();
                                  @endphp

                                @foreach ($subsubcategories as $subsubcategory)

                                  <ul class="links">
                                    <li><a href="{{ url('subsubcategory/product/' . $subsubcategory->id . '/' . $subsubcategory->slug) }}">{{ $subsubcategory->name }}</a></li>
                                  </ul>

                                @endforeach

                              </div>

                            @endforeach
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> 
                              <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}"> 
                            </div>

                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                @endforeach

                <li> <a href="{{ route('shop.page') }}">Shop</a> </li>
                <li class="dropdown  navbar-right special-menu"> <a href="{{ route('blog') }}">Blog</a> </li>  
              </ul>
              <div class="clearfix"></div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    
  </div>

  <div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('order.tracking') }}">
            @csrf
            <div class="modal-body">
              <label>Invoice Code</label>
              <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">           
            </div>
            <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>
          </form> 
        </div>
      </div>
    </div>
  </div>

</header>

<style>
  
  .search-area{
    position: relative;
  }
    #searchProducts {
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      background: #ffffff;
      z-index: 999;
      border-radius: 8px;
      margin-top: 5px;
  }
</style>

<script>
  function search_result_hide(){
    $("#searchProducts").slideUp();
  }
  function search_result_show(){
      $("#searchProducts").slideDown();
  }
</script>
