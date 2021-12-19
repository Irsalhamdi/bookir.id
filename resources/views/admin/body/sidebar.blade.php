  @php
      $route = Route::current()->getName();
      $prefix = Request::route()->getPrefix();
  @endphp
  
  <aside class="main-sidebar">
      <section class="sidebar">	
		
        <div class="user-profile">
			    <div class="ulogo">
				    <a href="index.html">
					    <div class="d-flex align-items-center justify-content-center">					 	
						    <img src="{{ asset('backend/images/shop.png') }}" alt="" width="30" height="30">
						    <h3><b>Ecommerce</b> Admin</h3>
				  	  </div>
				    </a>
			    </div>
        </div>
        
        @php
          $brand = (auth()->guard('admin')->user()->brand == 1);
          $category = (auth()->guard('admin')->user()->category == 1);
          $product = (auth()->guard('admin')->user()->products == 1);
          $slider = (auth()->guard('admin')->user()->sliders == 1);
          $coupons = (auth()->guard('admin')->user()->coupon == 1);
          $blog = (auth()->guard('admin')->user()->blog == 1);
          $setting = (auth()->guard('admin')->user()->settings == 1);
          $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
          $review = (auth()->guard('admin')->user()->review == 1);
          $orders = (auth()->guard('admin')->user()->order == 1);
          $stock = (auth()->guard('admin')->user()->stock == 1);
          $reports = (auth()->guard('admin')->user()->report == 1);
          $alluser = (auth()->guard('admin')->user()->users == 1);
          $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp

        <ul class="sidebar-menu" data-widget="tree">  
		  
		      <li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}">
              <i data-feather="pie-chart"></i>
			          <span>Dashboard</span>
            </a>
          </li>  
          
          @if($brand == true) 
            <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }}">
              <a href="{{ route('all.brand') }}">
                <i data-feather="message-circle"></i>
                <span>Brand</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all.brand') ? 'active' : '' }}">
                  <a href="{{ route('all.brand') }}"><i class="ti-more"></i>Brand</a>
                </li>
              </ul>
            </li> 
          @else
          @endif   

          @if($category == true)
            <li class="treeview {{ ($prefix == '/category') ? 'active' : '' }}">
              <a href="{{ route('all.category') }}">
                <i data-feather="mail"></i> <span>Category</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all.category') ? 'active' : '' }}">
                  <a href="{{ route('all.category') }}"><i class="ti-more"></i>Category</a>
                </li>
                <li class="{{ ($route == 'all.sub.category') ? 'active' : '' }}">
                  <a href="{{ route('all.sub.category') }}"><i class="ti-more"></i>Sub-Category</a>
                </li>
                <li class="{{ ($route == 'all.sub.sub.category') ? 'active' : '' }}">
                  <a href="{{ route('all.sub.sub.category') }}"><i class="ti-more"></i>Sub-sub-Category</a>
                </li>
              </ul>
            </li>
          @else
          @endif            
          
          @if($product == true)
            <li class="treeview {{ ($prefix == '/products') ? 'actice' : ''}}">
              <a href="{{ route('all.products') }}">
                <i data-feather="file"></i>
                <span>Products</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'add.products') ? 'active' : '' }}">
                  <a href="{{ route('add.products') }}"><i class="ti-more"></i>Add Products</a>
                </li>              
                <li class="{{ ($route == 'all.products') ? 'active' : '' }}">
                  <a href="{{ route('all.products') }}"><i class="ti-more"></i>Products</a>
                </li>
              </ul>
            </li> 		  
		       @else
          @endif

          @if($slider == true)
            <li class="treeview {{ ($prefix == '/sliders') ? 'active' : '' }}">
              <a href="{{ route('all.sliders') }}">
                <i data-feather="mail"></i> <span>Sliders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all.sliders') ? 'active' : '' }}">
                  <a href="{{ route('all.sliders') }}"><i class="ti-more"></i>Sliders</a>
                </li>
              </ul>
            </li>
          @else
          @endif

          @if($coupons == true)
            <li class="treeview {{ ($prefix == '/coupon') ? 'active' : '' }}">
              <a href="{{ route('all.coupons') }}">
                <i data-feather="mail"></i> <span>Coupons</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all.coupons') ? 'active' : '' }}">
                  <a href="{{ route('all.coupons') }}"><i class="ti-more"></i>Coupons</a>
                </li>
              </ul>
            </li>
          @else
          @endif

          <li class="header nav-small-cap">User Interface</li>
          @if($orders == true)
            <li class="treeview {{ ($prefix == '/order') ? 'active' : '' }}">
              <a href="{{ route('pending.order') }}">
                <i data-feather="mail"></i> <span>Orders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'pending.order') ? 'active' : '' }}">
                  <a href="{{ route('pending.order') }}"><i class="ti-more"></i>Pending Orders</a>
                </li>
                <li class="{{ ($route == 'confirmed.order') ? 'active' : '' }}">
                  <a href="{{ route('confirmed.order') }}"><i class="ti-more"></i>Confirmed Orders</a>
                </li>
                <li class="{{ ($route == 'processing.order') ? 'active' : '' }}">
                  <a href="{{ route('processing.order') }}"><i class="ti-more"></i>Processing Orders</a>
                </li>
                <li class="{{ ($route == 'picked.order') ? 'active' : '' }}">
                  <a href="{{ route('picked.order') }}"><i class="ti-more"></i>Picked Orders</a>
                </li>
                <li class="{{ ($route == 'shipped.order') ? 'active' : '' }}">
                  <a href="{{ route('shipped.order') }}"><i class="ti-more"></i>Shipped Orders</a>
                </li>
                <li class="{{ ($route == 'delivered.order') ? 'active' : '' }}">
                  <a href="{{ route('delivered.order') }}"><i class="ti-more"></i>Delivered Orders</a>
                </li>
                <li class="{{ ($route == 'cancelled.order') ? 'active' : '' }}">
                  <a href="{{ route('cancelled.order') }}"><i class="ti-more"></i>Cancelled Orders</a>
                </li>
              </ul>
            </li>
          @else
          @endif  

          @if($stock == true)
            <li class="treeview {{ ($prefix == '/stock') ? 'active' : '' }}">
              <a href="{{ route('product.stock') }}">
                <i data-feather="mail"></i> <span>Manage Stock</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'product.stock') ? 'active' : '' }}">
                  <a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a>
                </li>
              </ul>
            </li>
		      @else
          @endif

          @if($reports == true)
            <li class="treeview {{ ($prefix == '/report') ? 'active' : '' }}">
              <a href="{{ route('report.search') }}">
                <i data-feather="mail"></i> <span>Report</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'report.search') ? 'active' : '' }}">
                  <a href="{{ route('report.search') }}"><i class="ti-more"></i>Report</a>
                </li>
              </ul>
            </li>
          @else
          @endif

          @if($alluser == true)
            <li class="treeview {{ ($prefix == '/users') ? 'active' : '' }}">
              <a href="{{ route('users.all') }}">
                <i data-feather="mail"></i> <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'users.all') ? 'active' : '' }}">
                  <a href="{{ route('report.search') }}"><i class="ti-more"></i>Report</a>
                </li>
              </ul>
            </li>
          @else
          @endif

          @if($adminuserrole == true)
            <li class="treeview {{ ($prefix == '/adminuserrole') ? 'active' : '' }}">
              <a href="{{ route('all.admin.user') }}">
                <i data-feather="mail"></i> <span>Admin User Role</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all.admin.user') ? 'active' : '' }}">
                  <a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin User</a>
                </li>
              </ul>
            </li>
          @else
          @endif

          @if($blog == true)
            <li class="treeview {{ ($prefix == '/blog') ? 'active' : '' }}">
              <a href="{{ route('blog.category') }}">
                <i data-feather="mail"></i> <span>Category</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'blog.category') ? 'active' : '' }}">
                  <a href="{{ route('blog.category') }}"><i class="ti-more"></i>Category</a>
                </li>
                <li class="{{ ($route == 'blog.post') ? 'active' : '' }}">
                  <a href="{{ route('blog.post') }}"><i class="ti-more"></i>Post</a>
                </li>
                <li class="{{ ($route == 'add.blog.post') ? 'active' : '' }}">
                  <a href="{{ route('add.blog.post') }}"><i class="ti-more"></i>Add Post</a>
                </li>
              </ul>
            </li>
          @else
          @endif        
          
          @if($setting == true)
            <li class="treeview {{ ($prefix == '/settings') ? 'active' : '' }}">
              <a href="{{ route('site') }}">
                <i data-feather="mail"></i> <span>Settings</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'site') ? 'active' : '' }}">
                  <a href="{{ route('site') }}"><i class="ti-more"></i>Settings</a>
                </li>
                <li class="{{ ($route == 'seo') ? 'active' : '' }}">
                  <a href="{{ route('seo') }}"><i class="ti-more"></i>Seo Settings</a>
                </li>
              </ul>
            </li>
          @else
          @endif

          @if($review == true)
            <li class="treeview {{ ($prefix == '/review') ? 'active' : '' }}">
              <a href="{{ route('site') }}">
                <i data-feather="mail"></i> <span>Review</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'pending.review') ? 'active' : '' }}">
                  <a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a>
                </li>
                <li class="{{ ($route == 'publish.review') ? 'active' : '' }}">
                  <a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a>
                </li>
              </ul>
            </li>
          @else
          @endif
        
        </ul>

    </section>
	
	  <div class="sidebar-footer">
		  <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		  <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		  <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	  </div>
  </aside>