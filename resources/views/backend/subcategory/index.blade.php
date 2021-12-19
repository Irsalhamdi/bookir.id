@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

		<section class="content">
		    <div class="row">    

            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Sub-Category List
                            <span class="badge badge-pill badge-danger"> {{ count($data) }} </span>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Category</td>
                                    <td>Name</td>
                                    <td>Image</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->category->name }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <img src="{{ asset($data->image) }}" width="70" height="40">
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.sub.category', $data->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ route('delete.sub.category', $data->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
                            <form action="{{ route('add.sub.category') }}" method="POST" enctype="multipart/form-data">
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
@endsection
