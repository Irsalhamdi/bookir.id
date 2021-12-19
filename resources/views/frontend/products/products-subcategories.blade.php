@extends('frontend.main_master')

@section('title')
    Subcategory Products
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
                            <div class="sidebar-widget-body m-t-10">
                                @include('frontend.common.tags')                                
                            </div>
                        
                        </div>

                        <div class="sidebar-widget wow fadeInUp">
                        <div class="widget-header">
                            <h4 class="widget-title"></h4>
                        </div>

                    </div>

                        <div class="sidebar-widget wow fadeInUp">
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
                        <span class="badge badge-danger" style="background: #808080"> 
                            {{ $breadcrumb->category->name }} 
                        </span>
                    @endforeach /                
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
                                    <div class="row" id="grid_view_product">

                                        @include('frontend.products.grid_view_product');

                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane "  id="list-container">
                                <div class="category-product" id="list_view_product">

                                    @include('frontend.products.list_view_product')

                                </div>
                            </div>

                        </div>

                        <div class="clearfix filters-container">
                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    
                </div> 

                <div class="ajax-loadmore-product text-center" style="display: none;">
                    <img src="{{ asset('frontend/assets/images/Spinner-0.4s-203px.svg') }}" style="width: 120px; height: 120px;">
                </div>
                
            </div>

            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                    
                    <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                    
                    <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                    
                    <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                    
                    <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                    
                    <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                    
                    <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                    
                    <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                    
                    <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                    
                    <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item--> 
                    </div>
                    <!-- /.owl-carousel #logo-slider --> 
                </div> 
            
            </div>

        </div>
    </div>

    <script>
        function loadmoreProduct(page){
            $.ajax({
                type: "get",
                url: "?page="+page,
                beforeSend: function(response){
                $('.ajax-loadmore-product').show();
                }
            })

            .done(function(data){
                if (data.grid_view == " " || data.list_view == " ") {
                    return;
                }
                $('.ajax-loadmore-product').hide();
                $('#grid_view_product').append(data.grid_view);
                $('#list_view_product').append(data.list_view);
            })
            .fail(function(){
                alert('Something Went Wrong');
            })        
        }
        var page = 1;
        $(window).scroll(function (){
            if ($(window).scrollTop() +$(window).height() >= $(document).height()){
                page ++;
                loadmoreProduct(page);
            }
        });
    </script>

@endsection