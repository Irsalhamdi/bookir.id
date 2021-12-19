@extends('admin.admin_master')

@section('admin')
   	  <div class="container-full">
        <section class="content">
		    <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Coupon</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{ route('update.coupon') }}" method="POST">
                                    @csrf
                                    <div class="form-group text-center">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                    </div>                                
                                    <div class="form-group">
                                        <h5>Name</h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $data->name }}" required> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Discount</h5>
                                        <div class="controls">
                                            <input type="number" name="discount" class="form-control" value="{{ $data->discount }}" required> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Validity</h5>
                                        <div class="controls">
                                            <input type="date" name="validity" class="form-control" value="{{ $data->validity }}" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required> 
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