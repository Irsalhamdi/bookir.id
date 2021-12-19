<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Blog Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">
			<div class="accordion-group">
				<div class="accordion-inner">

                    @php
                        $categories = App\Models\Blog\BlogCategory::orderBy('name', 'ASC')->get();
                    @endphp

					@foreach($categories as $category)
						<ul class="list-group">
							<li class="list-group-item">
								<a href="{{ url('blog-post/category/'. $category->slug . '/' . $category->id) }}"> {{ $category->name }} </a> 
							</li>
						</ul>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>