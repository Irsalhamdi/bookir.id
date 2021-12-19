@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

		<section class="content">
		    <div class="row">    

            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Product Stock List
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
                                    <td>Qty</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <img src="{{ asset($data->thumbnail) }}" width="70" height="40">
                                        </td>
                                        <td>{{ $data->qty }}</td>
                                    </tr>
                                @endforeach
                            </tbody>    
                        </table>
                        </div>
                    </div>
			    </div>  
            </div>

            </div>
		</section>
	  
	</div>    
    
@endsection