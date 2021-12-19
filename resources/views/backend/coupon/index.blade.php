@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

		<section class="content">
		    <div class="row">    

            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Coupon List
                            <span class="badge badge-pill badge-danger"> {{ count($data) }} </span>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Discount</td>
                                    <td>Validity</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->discount }} % </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($data->validity)->format('D, d F Y') }}
                                        </td>
                                        <td>
                                            @if ($data->validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge badge-pill badge-success">
                                                Valid
                                            </span> 
                                            @else   
                                            <span class="badge badge-pill badge-danger">
                                                InValid
                                            </span> 
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.coupon', $data->id) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            <a href="{{ route('delete.coupon', $data->id) }}" class="btn btn-sm btn-danger">
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
                        <h3 class="box-title">Add New Coupon</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('add.coupon') }}" method="POST">
							    @csrf
							    <div class="form-group">
								    <h5>Name</h5>
								    <div class="controls">
									    <input type="text" name="name" class="form-control" required> 
								    </div>
							    </div>
							    <div class="form-group">
								    <h5>Discount</h5>
								    <div class="controls">
									    <input type="number" name="discount" class="form-control" required> 
								    </div>
							    </div>
							    <div class="form-group">
								    <h5>Validaty Date</h5>
								    <div class="controls">
									    <input type="date" name="validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required> 
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