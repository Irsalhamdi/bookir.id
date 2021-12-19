<div class="sidebar-widget wow fadeInUp">
                                <h3 class="section-title">shop by</h3>
                                <div class="widget-header">
                                    <h4 class="widget-title">Category</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">

                                        @foreach ($categories as $category)
                                            
                                            <div class="accordion-group">
                                                <div class="accordion-heading"> 
                                                    <a href="#collapse{{ $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed"> {{ $category->name }}</a> 
                                                </div>
                                                <div class="accordion-body collapse" id="collapse{{ $category->id }}" style="height: 0px;">
                                                    <div class="accordion-inner">
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('name', 'ASC')->get();
                                                        @endphp
                                                        <ul>
                                                            @foreach ($subcategories as $subcategory)
                                                                <li><a href="{{ url('subcategory/product/'. $subcategory->id . '/' . $subcategory->slug) }}">{{ $subcategory->name }}</a></li>                                                            
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach                                
                                    </div>
                                </div>
</div>