@extends('admin.admin_master')

@section('admin')
   	  <div class="container-full">
        <section class="content">
		    <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Sub-Category</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{ route('update.sub.category') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group text-center">                                
                                        <img id="showImage" src="{{ asset($data->image) }}" width="100" height="100">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <input type="hidden" name="old_image" value="{{ $data->image }}">
                                    </div>                    
                                    <div class="form-group">
                                        <h5>Image</h5>
                                        <div class="controls">
                                            <input id="image" type="file" name="image" class="form-control">
                                        </div>
                                    </div>               
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
                                    <div class="form-group">
                                        <h5>Category Name</h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $data->name }}" required> 
                                        </div>
                                    </div>
                                    <div class="form-group">                            
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-success mb-5">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
		</section>
	  </div> 
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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