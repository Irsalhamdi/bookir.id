@extends('frontend.main_master')

@section('title')
    Blog | Category
@endsection

@section('content')
    <div class="breadcrumb">
	    <div class="container">
		    <div class="breadcrumb-inner">
			    <ul class="list-inline list-unstyled">
				    <li><a href="/">Home</a></li>
				    <li class='active'>Blog</li>
			    </ul>
		    </div>
	    </div>
    </div>

	<div class="body-content">
		<div class="container">
			<div class="row">
				<div class="blog-page">
					<div class="col-md-9">	
						@foreach ($blogs as $blog)
							<div class="blog-post  wow fadeInUp">
								<a href="{{ route('blog.detail', $blog->slug) }}">
									<img class="img-responsive" src="{{ asset($blog->image) }}" alt="">
								</a>
								<h1>
									<a href="{{ route('blog.detail', $blog->slug) }}">
										{{ $blog->title }}
									</a>
								</h1>
								<span class="date-time">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>
								<p>
									{!! Str::limit($blog->description, 100 )  !!}
								</p>
								<a href="{{ route('blog.detail', $blog->slug) }}" class="btn btn-upper btn-primary read-more">read more</a>
							</div>
						@endforeach
						<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
							<div class="text-right">
								<div class="pagination-container">
									<ul class="list-inline list-unstyled">
										<li class="prev">
											<a href="#"><i class="fa fa-angle-left"></i></a>
										</li>
										<li><a href="#">1</a></li>	
										<li class="active"><a href="#">2</a></li>	
										<li><a href="#">3</a></li>	
										<li><a href="#">4</a></li>	
										<li class="next">
											<a href="#"><i class="fa fa-angle-right"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
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
							@include('frontend.common.blog-category')
							@include('frontend.common.tags')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection