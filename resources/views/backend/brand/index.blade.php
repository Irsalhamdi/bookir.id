@extends('admin.admin_master')

@section('admin')
	  <div class="container-full">

		<section class="content">
		  <div class="row">

            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Brand List
                            <span class="badge badge-pill badge-danger"> {{ count($data) }} </span>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Image</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <img src="{{ asset($data->image) }}" width="70" height="40">
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.brand', $data->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ route('delete.brand', $data->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
                        <h3 class="box-title">Add New Brand</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('add.brand') }}" method="POST" enctype="multipart/form-data">
							    @csrf
							    <div class="form-group">
								    <h5>Brand Name</h5>
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