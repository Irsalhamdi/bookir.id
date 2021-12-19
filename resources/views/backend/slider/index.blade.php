@extends('admin.admin_master')

@section('admin')
	  <div class="container-full">

		<section class="content">
		  <div class="row">

            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sliders List</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Title</td>
                                    <td>Description</td>
                                    <td>Image</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>
                                            <img src="{{ asset($data->image) }}" width="70" height="40">
                                        </td>
                                        <td>
                                            @if ($data->status == 1)
                                                <a href="{{ route('inactive.sliders', $data->id) }}" class="badge badge-pill badge-success"> Active </a>
                                            @else                                                
                                                <a href="{{ route('active.sliders', $data->id) }}" class="badge badge-pill badge-danger"> Inactive </a>
                                            @endif
                                        <td>
                                            <a href="{{ route('edit.sliders', $data->id) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('delete.sliders', $data->id) }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
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
                        <h3 class="box-title">Add New Sliders</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('add.sliders') }}" method="POST" enctype="multipart/form-data">
							    @csrf
							    <div class="form-group">
								    <h5>Title</h5>
								    <div class="controls">
									    <input type="text" name="title" class="form-control" required> 
								    </div>
							    </div>
							    <div class="form-group">
								    <h5>Description</h5>
								    <div class="controls">
									    <textarea type="text" name="description" class="form-control" required></textarea>
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