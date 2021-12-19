@extends('frontend.main_master')

@section('title')
    {{ $blog->title }}
@endsection

@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>{{ $blog->title }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp">
                            <img class="img-responsive" src="{{ asset($blog->image) }}" alt="">
                            <h1>{{ $blog->title }} </h1>
                            <span class="date-time">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>
                            <div class="addthis_inline_share_toolbox"></div>
                            <p>{!!  $blog->description  !!} </p>
                            <div class="social-media">
                                <span>share post:</span>
                                <div class="addthis_inline_share_toolbox"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    </div>
                    <div class="col-md-3 sidebar">
                        <div class="sidebar-module-container">
                            <div class="search-area outer-bottom-small">
                            <form>
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field">
                                    <a href="#" class="search-button"></a>   
                                </div>
                            </form>
                        </div>		
                        <div class="home-banner outer-top-n outer-bottom-xs">
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                        </div>
                        @include('frontend.common.blog-category');
                        @include('frontend.common.tags');	
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61b6c1917fce2298"></script>

@endsection