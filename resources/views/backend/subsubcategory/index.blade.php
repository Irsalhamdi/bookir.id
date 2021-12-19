@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

		<section class="content">
		    <div class="row">    

            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Sub-sub-Category List
                            <span class="badge badge-pill badge-danger"> {{ count($data) }} </span>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Sub-Category</td>
                                    <td>Name</td>
                                    <td>Image</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->subcategory->name }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <img src="{{ asset($data->image) }}" width="70" height="40">
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.sub.sub.category', $data->id) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('delete.sub.sub.category', $data->id) }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>    
                        </table>
                        </div>
                    </div>
			    </div>  
            </div>

            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Sub-Category</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('add.sub.sub.category') }}" method="POST" enctype="multipart/form-data">
							    @csrf
                                <div class="form-group">
                                    <h5>Category</h5>
                                    <div class="controls">
                                        <select name="category_id" required class="form-control">
                                            <option value="" selected="" disabled="">
                                                Select Category
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Sub-Category</h5>
                                    <div class="controls">
                                        <select name="subcategory_id" required class="form-control">
                                            <option value="" selected="" disabled="">
                                                Select Sub-Category
                                            </option>
                                        </select>
                                    </div>
                                </div>
							    <div class="form-group">
								    <h5>Sub-Category Name</h5>
								    <div class="controls">
									    <input type="text" name="name" class="form-control" required> 
								    </div>
							    </div>
							    <div class="form-group">
								    <h5>Image</h5>
								    <div class="controls">
									    <input type="file" name="image" class="form-control" required>
								    </div>
							    </div>
							    <div class="form-group">                            
							        <div class="text-xs-right">
								        <button type="submit" class="btn btn-sm btn-rounded btn-success mb-5">
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
</script>

@endsection
