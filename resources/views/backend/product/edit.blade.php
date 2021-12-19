@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <section class="content">
		    <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Product</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{ route('update.products') }}" method="POST" enctype="multipart/form-data">
                                    @csrf   
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Brand</h5>
                                                <div class="controls">
                                                    <select name="brand_id" required class="form-control">
                                                        <option value="" selected="" disabled="">
                                                            Select Brand
                                                        </option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}" {{ $brand->id == $data->brand_id ? 'selected' : '' }}>
                                                                {{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Category</h5>
                                                <div class="controls">
                                                    <select name="category_id" required class="form-control">
                                                        <option value="" selected="" disabled="">
                                                            Select Category
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $category->id == $data->category_id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Sub Category</h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" required class="form-control">
                                                        <option value="" selected="" disabled="">
                                                            Select Sub-Category
                                                        </option>
                                                        @foreach ($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $data->subcategory_id ? 'selected' : '' }}>
                                                                {{ $subcategory->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Sub-Sub-Category</h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" required class="form-control">
                                                        <option value="" selected="" disabled="">
                                                            Select Sub-Sub-Category
                                                        </option>
                                                        @foreach ($subsubcategories as $subsubcategory)
                                                            <option value="{{ $subsubcategory->id }}" {{ $subsubcategory->id == $data->subsubcategory_id ? 'selected' : '' }}>
                                                                {{ $subsubcategory->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Name</h5>
                                                <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Code</h5>
                                                <input type="text" class="form-control" name="code" value="{{ $data->code }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Price</h5>
                                                <input type="number" class="form-control" name="price" value="{{ $data->price }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Discount</h5>
                                                <input type="number" class="form-control" name="discount" value="{{ $data->discount }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Qty</h5>
                                                <input type="number" class="form-control" name="qty" value="{{ $data->qty }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>Colour</h5>
                                            <div class="control">
                                                <input type="text" name="color" value="{{ $data->color }}" data-role="tagsinput" placeholder="add tags" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Size</h5>
                                            <div class="control">
                                                <input type="text" name="size" class="form-control" value="{{ $data->size }}" data-role="tagsinput" required/> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Tags</h5>
                                            <div class="control">
                                                <input type="text" name="tags" class="form-control" value="{{ $data->tags }}" data-role="tagsinput" required/> 
                                            </div>
                                        </div>
                                    </div>        
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Description</h5>
                                                <textarea id="editor1" name="description" class="form-control" cols="30" rows="10" required>
                                                    {!! $data->description !!}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>               
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Short Description</h5>
                                                <textarea id="editor2" name="short_description" class="form-control" cols="30" rows="10" required>
                                                    {!! $data->short_description !!}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="checkbox" name="hot_deals" id="checkbox_1" value="1" {{ $data->hot_deals == '1' ? 'checked' : ''  }} />
						                        <label for="checkbox_1">Hot Deals</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="checkbox" name="features" id="checkbox_2" value="1" {{ $data->features == '1' ? 'checked' : '' }}/>
						                        <label for="checkbox_2">Features</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="checkbox" name="special_offer" id="checkbox_3" value="1" {{ $data->special_offer == '1' ? 'checked' : ''}}/>
						                        <label for="checkbox_3">Special Offer</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="checkbox" name="special_deals" id="checkbox_4" value="1" {{ $data->speacial_deals == '1' ? 'checked' : '' }}/>
						                        <label for="checkbox_4">Special Deals</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">                            
                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-success mb-5">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
		</section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
  				    <div class="box bt-3 border-info">
  				        <div class="box-header">
  					        <h4 class="box-title">Update Images</h4>
  				        </div>
                        <form action="{{ route('update.images') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach ($images as $image)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ asset($image->name) }}" width="280" height="130">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Image">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </h5>
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image</label>
                                                    <input type="file" name="name[ $image->id ]" class="form-control">
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-primary mb-5">
                                    Update Image
                                </button>
                            </div>
                        </form>
  				    </div>
			    </div>
            </div>
        </section>
	</div>     

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{ url('/category/subsubcategory/ajax') }}/"+category_id,
                        type : "GET",
                        dataType : "json",
                        success : function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');
                                });
                        },
                    });
                } else{
                    alert('danger');
                }
            });
        });
        $(document).ready(function() {
            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                if(subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub-sub-category/ajax') }}/"+subcategory_id,
                        type : "GET",
                        dataType : "json",
                        success : function(data) {
                            var d = $('select[name="subsubcategory_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="subsubcategory_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');
                                });
                        },
                    });
                } else{
                    alert('danger');
                }
            });
        });
    </script>
    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }    
    </script>    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#multiImg').on('change', function(){
                if (window.File && window.FileReader && window.FileList && window.Blob){
                    var data = $(this)[0].files;
           
                    $.each(data, function(index, file){
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){

                            var fRead = new FileReader();
                            fRead.onload = (function(file){

                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80).height(80); 
                                    $('#preview_img').append(img);
                                };

                            })(file);

                            fRead.readAsDataURL(file);
                        }
                    });
           
                }else{
                    alert("Your browser doesn't support File API!");
                }
            });
        });
    </script>

@endsection
