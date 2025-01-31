@extends('frontend.main_master')

@section('title')
    Sub - Subcategory Products
@endsection

@section('content')
    
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>

                    @foreach($breadcrumbs as $breadcrumb)
                        <li class='active'>{{ $breadcrumb->category->name }}</li>
                    @endforeach

                    @foreach($breadcrumbs as $breadcrumb)
                        <li class='active'>{{ $breadcrumb->subcategory->name }}</li>
                    @endforeach                          

                    @foreach($breadcrumbs as $breadcrumb)
                        <li class='active'>{{ $breadcrumb->name }}</li>                    
                    @endforeach

                </ul>
            </div> 
        </div>
    </div>

    <div class="body-content outer-top-xs">
        <div class='container'>

            <div class='row'>

                <div class='col-md-3 sidebar'> 
                    
                    @include('frontend.common.category')

                    <div class="sidebar-module-container">

                        <div class="sidebar-filter"> 

                            <div class="sidebar-widget wow fadeInUp">
                            </div>
                            <div class="sidebar-widget wow fadeInUp">
                                @include('frontend.common.tags')                                
                            <div class="sidebar-widget-body m-t-10">
                            </div>
                        
                        </div>

                        <div class="sidebar-widget wow fadeInUp">
                        <div class="sidebar-widget-body">
                            <ul class="list">
                            </ul>
                        </div>

                    </div>

                        <div class="sidebar-widget wow fadeInUp">

                            <div class="widget-header">
                                <h4 class="widget-title"></h4>
                            </div>
                            
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                </ul>
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
                    
                    @foreach($breadcrumbs as $breadcrumb)
                        <span class="badge badge-danger" style="background: #808080">{{ $breadcrumb->category->name }}</span> 
                    @endforeach                 
                    @foreach($breadcrumbs as $breadcrumb)
                        <span class="badge badge-danger" style="background: #808080">
                            {{ $breadcrumb->subcategory->name }}
                        </span>
                    @endforeach                 
                    @foreach($breadcrumbs as $breadcrumb)
                        <span class="badge badge-danger" style="background: #FF0000">
                            {{ $breadcrumb->name }}
                        </span>                    
                    @endforeach

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

                            <div class="col col-sm-12 col-md-6">

                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                                        <ul role="menu" class="dropdown-menu">
                                            <li role="presentation"><a href="#">position</a></li>
                                            <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                            <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                            <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld --> 
                                    </div>
                                    <!-- /.lbl-cnt --> 
                                </div>

                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Show</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">1</a></li>
                                                <li role="presentation"><a href="#">2</a></li>
                                                <li role="presentation"><a href="#">3</a></li>
                                                <li role="presentation"><a href="#">4</a></li>
                                                <li role="presentation"><a href="#">5</a></li>
                                                <li role="presentation"><a href="#">6</a></li>
                                                <li role="presentation"><a href="#">7</a></li>
                                                <li role="presentation"><a href="#">8</a></li>
                                                <li role="presentation"><a href="#">9</a></li>
                                                <li role="presentation"><a href="#">10</a></li>
                                            </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col col-sm-6 col-md-4 text-right">

                                <div class="pagination-container">
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
                                        {{ $products->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    
                </div> 

            </div>

        </div>
    </div>

@endsection