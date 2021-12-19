    <div class="side-menu animate-dropdown outer-bottom-xs">

          <div class="head">
            <i class="icon fa fa-align-justify fa-fw"></i>
            Categories
          </div>

          <nav class="yamm megamenu-horizontal">
            <ul class="nav">

              @php
                  $categories = App\Models\Category::orderBy('name', 'ASC')->Get();
              @endphp

              @foreach ($categories as $category)
                <li class="dropdown menu-item"> 

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset($category->image) }}" width="20" height="15">
                    {{ $category->name }}
                  </a>

                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">

                        @php
                            $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('name', 'ASC')->get();
                        @endphp

                        @foreach ($subcategories as $subcategory)

                          <div class="col-sm-12 col-md-3">

                              <a href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->slug) }}">
                                <h2 class="title">
                                  {{ $subcategory->name }}
                                </h2>
                              </a>

                              @php
                                $subsubcategories = App\Models\SubSubcategory::where('subcategory_id',   $subcategory->id)->orderBy('name', 'ASC')->get();
                              @endphp

                              @foreach ($subsubcategories as $subsubcategory)
                                <ul class="links list-unstyled">
                                  <li><a href="{{ url('subsubcategory/product/' . $subsubcategory->id . '/' .$subsubcategory->slug) }}">{{ $subsubcategory->name }}</a></li>
                                </ul>
                              @endforeach

                          </div>

                        @endforeach

                      </div>
                    </li>
                  </ul>

                </li>
              @endforeach

            </ul>
          </nav>

    </div>