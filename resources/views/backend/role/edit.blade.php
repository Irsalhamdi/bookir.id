@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
	    <section class="content">
		    <div class="box">
			    <div class="box-header with-border">
			        <h4 class="box-title">Edit Admin User </h4>
			    </div>
			    <div class="box-body"></div>
	                <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data" >
	 	                @csrf
	 	                <input type="hidden" name="id" value="{{ $admin->id }}">	
	                    <input type="hidden" name="old_image" value="{{ $admin->profile_photo_path }}">
						<div class="col-12">
                                    <div class="row">
				                        <div class="col-md-12 text-center">
	                                        <img id="showImage" src="{{ url('upload/default.jpg') }}" style="width: 100px; height: 100px;">				
				                        </div>
                                    </div> 
                                    <div class="row">
				                        <div class="col-md-12">
		                                    <div class="form-group">
		                                        <h5>Admin User Image <span class="text-danger">*</span></h5>
		                                        <div class="controls">
                                                    <input type="file" name="profile_photo_path" class="form-control" id="image"> 
                                                </div>
	                                        </div>
				                        </div>
                                    </div>
			                        <div class="row">
				                        <div class="col-md-12">
	                                        <div class="form-group">
		                                        <h5>Admin User Name  <span class="text-danger">*</span></h5>
		                                        <div class="controls">
	                                                <input type="text" name="name" class="form-control" value="{{ $admin->name }}" > 
                                                </div>
	                                        </div>
				                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
	                                        <div class="form-group">
		                                        <h5>Admin Email  <span class="text-danger">*</span></h5>
		                                        <div class="controls">
	                                                <input type="email" name="email" class="form-control" value="{{ $admin->email }}" > 
                                                </div>
				                            </div> 
			                            </div>
                                    </div>
	                                <div class="row">
				                        <div class="col-md-12">
	                                        <div class="form-group">
		                                        <h5>Admin User Phone  <span class="text-danger">*</span></h5>
		                                        <div class="controls">
	                                                <input type="text" name="phone" class="form-control" value="{{ $admin->phone }}" > 
                                                </div>
	                                        </div>
				                        </div> 
			                        </div>
	                                <hr>
	                                <div class="row">
                                        <div class="col-md-4">
			                                <div class="form-group">
		                                        <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="brand" value="1" {{ $admin->brand == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_2">Brand</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="category" value="1" {{ $admin->category == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_3">Category</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="product" value="1" {{ $admin->product == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_4">Product</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="slider" value="1" {{ $admin->slider == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_5">Slider</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_6" name="coupons" value="1" {{ $admin->coupons == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_6">Coupons</label>
                                                    </fieldset>
		                                        </div>
	                                        </div>
                                        </div>
                                        <div class="col-md-4">
			                                <div class="form-group">
		                                        <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_8" name="blog" value="1" {{ $admin->blog == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_8">Blog</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_9" name="setting" value="1" {{ $admin->setting == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_9">Setting</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_10" name="returnorder" value="1" {{ $admin->returnorder == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_10">Return Order</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_11" name="review" value="1" {{ $admin->review == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_11">	Review</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_12" name="orders" value="1" {{ $admin->orders == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_12">Orders</label>
                                                    </fieldset>
		                                        </div>
	                                        </div>
                                        </div>
                                        <div class="col-md-4">
	                                        <div class="form-group">
		                                        <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_13" name="stock" value="1" {{ $admin->stock == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_13">Stock</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_14" name="reports" value="1" {{ $admin->reports == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_14">Reports</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_15" name="alluser" value="1" {{ $admin->alluser == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_15">Alluser</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_16" name="adminrole" value="1" {{ $admin->adminrole == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_16">adminrole</label>
                                                    </fieldset>
		                                        </div>
			                                </div>
		                                </div>
						            </div>
			                        <div class="text-xs-right">
	                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Admin User">					 
						            </div>
                        </div>
					</form>
			    </div>
		    </div>
		</section>
	</div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);	
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection