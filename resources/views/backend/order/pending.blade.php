@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
		<section class="content">
		    <div class="row">    
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pending Orders List</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Date</td>
                                        <td>Invoice</td>
                                        <td>Amount</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ Carbon\Carbon::parse($data->order_date)->format('D, d F Y') }}</td>
                                            <td>{{ $data->invoice_no }} </td>
                                            <td>${{ $data->amount }}</td>
                                            <td>
                                                <span class="badge badge-pill badge-primary">{{ $data->status }} </span>
                                            </td>
                                            <td width="25%">
                                                <a href="{{ route('order.detail', $data->id) }}" class="btn btn-info" title="Edit Data">
                                                    <i class="fa fa-eye"></i> 
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
            </div>
		</section>
	</div>   

@endsection