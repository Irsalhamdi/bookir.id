@extends('frontend.main_master')

@section('title')
    Shop Products
@endsection

@section('content')
    
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class="active"><a href="{{ route('shop.page') }}">Shop Page</a></li>
                </ul>
            </div> 
        </div>
    </div>

    <div class="body-content outer-top-xs">
        <div class='container'>

            <form action="{{ route('shop.filter') }}" method="post">
                @csrf

                <div class='row'>

                    <div class='col-md-3 sidebar'> 
                        
                        @include('frontend.common.category')

                        <div class="sidebar-module-container">

                            <div class="sidebar-filter"> 

                                <div class="sidebar-widget wow fadeInUp">
                                    <h3 class="section-title">shop by</h3>

                                    <div class="widget-header">
                                        <h4 class="widget-title">Category</h4>
                                    </div>
                                    <div class="sidebar-widget-body">
                                        <div class="accordion">

                                            @if(!empty($_GET['category']))
                                                @php
                                                    $filterCat = explode(',',$_GET['category']);
                                                @endphp
                                            @endif

                                            @foreach ($categories as $category)
                                                
                                                <div class="accordion-group">
                                                    <div class="accordion-heading"> 
                                                         <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" name="category[]" value="{{ $category->slug }}" @if(!empty($filterCat) && in_array($category->slug, $filterCat)) checked @endif onchange="this.form.submit()">

                                                            {{ $category->name }} 

                                                            </label>
                                                    </div>
                                                </div>

                                            @endforeach                       

                                        </div>
                                    </div>

                                    <div class="widget-header">
                                        <h4 class="widget-title">Brand</h4>
                                    </div>
                                    <div class="sidebar-widget-body">
                                        <div class="accordion">

                                            @if(!empty($_GET['brand']))
                                                @php
                                                    $filterBrand = explode(',',$_GET['brand']);
                                                @endphp
                                            @endif

                                            @foreach ($brands as $brand)
                                                <div class="accordion-group">
                                                    <div class="accordion-heading"> 
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" name="brand[]" value="{{ $brand->slug }}" @if(!empty($filterBrand) && in_array($brand->slug, $filterBrand)) checked @endif onchange="this.form.submit()">

                                                            {{ $brand->name }} 

                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach                       

                                        </div>
                                    </div>

                                </div>
                            
                            </div>

                        </div> 
                        
                    </div>

                    <div class='col-md-9'> 
                        
                        <div id="category" class="category-carousel hidden-xs">
                            <div class="item">
                                <div class="image"> 
                                    <img src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt="" class="img-responsive"> 
                                </div>
                                <div class="container-fluid">
                                    <div class="caption vertical-top text-left">
                                        <div class="big-text"> Big Sale </div>
                                        <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                        <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix filters-container m-t-10">

                            <div class="row">

                                <div class="col col-sm-6 col-md-2">

                                    <div class="filter-tabs">
                                        <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                            <li class="active"> 
                                                <a data-toggle="tab" href="#grid-container">
                                                    <i class="icon fa fa-th-large"></i>
                                                    Grid
                                                </a> 
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#list-container">
                                                    <i class="icon fa fa-th-list"></i>
                                                    List
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="search-result-container ">

                            <div id="myTabContent" class="tab-content category-list">

                                <div class="tab-pane active " id="grid-container">
                                    <div class="category-product">
                                        <div class="row">

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

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane "  id="list-container">
                                    <div class="category-product">

                                        @foreach ($products as $product)
                                            
                                            <div class="category-product-inner wow fadeInUp">
                                                <div class="products">
                                                    <div class="product-list product">

                                                        <div class="row product-list-row">

                                                            <div class="col col-sm-4 col-lg-4">

                                                                <div class="product-image">
                                                                    <div class="image"> 
                                                                        <img src="{{ asset($product->thumbnail) }}" alt=""> 
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>

                                                            <div class="col col-sm-8 col-lg-8">
                                                                <div class="product-info">
                                                                
                                                                    <h3 class="name">
                                                                        <a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                                                    </h3>

                                                                    <div class="rating rateit-small"></div>

                                                                    @if ($product->discount == NULL)                                            
                                                                        <div class="product-price"> 
                                                                            <span class="price"> ${{ $product->name }}</span>
                                                                        </div>
                                                                    @else
                                                                        <div class="product-price"> 
                                                                            <span class="price"> ${{ $product->discount }}</span> 
                                                                            <span class="price-before-discount">$ {{ $product->price }}</span> 
                                                                        </div>
                                                                    @endif

                                                                    <div class="description m-t-10">
                                                                        {!! $product->description !!}
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
                                                </div>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>

                            </div>

                            <div class="clearfix filters-container">
                                <div class="text-right">
                                    <div class="pagination-container">
                                        <ul class="list-inline list-unstyled">
                                            {{ $products->appends($_GET)->links('vendor.pagination.custom')  }}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        
                    </div> 

                </div>

            </form>

        </div>
    </div>

@endsection