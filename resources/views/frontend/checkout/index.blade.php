@extends('frontend.main_master')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">

                    <div class="col-md-8">

                        <div class="panel-group checkout-steps" id="accordion">
                            <div class="panel panel-default checkout-step-01">

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <div class="panel-body">
                                        <div class="row">		
                                    
                                            <div class="col-md-6 col-sm-6 guest-login">
                                                <form action="{{ route('checkout.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Shipping Name</label>
                                                        <input type="text" name="name" class="form-control unicase-form-control text-input"  placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
                                                    </div>  

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email</label>
                                                        <input type="email" name="email" class="form-control unicase-form-control text-input"  placeholder="Email" value="{{ Auth::user()->email }}" required="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Phone</label>
                                                        <input type="number" name="phone" class="form-control unicase-form-control text-input"  placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Post Code</label>
                                                        <input type="text" name="post_code" class="form-control unicase-form-control text-input"  placeholder="Postal Code" required="">
                                                    </div>  
                                            </div>

                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">
                                                            Province
                                                        </label>
                                                        <select name="province_id" required class="form-control">
                                                            <option value="" selected="" disabled="">
                                                                Select Province
                                                            </option>
                                                            @foreach ($provinces as $province)
                                                                <option value="{{ $province->id }}">
                                                                    {{ $province->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">
                                                            Regency
                                                        </label>
                                                        <select name="regency_id" required class="form-control">
                                                            <option value="" selected="" disabled="">
                                                                Select Regency
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">
                                                            District
                                                        </label>
                                                        <select name="district_id" required class="form-control">
                                                            <option value="" selected="" disabled="">
                                                                Select District
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">
                                                            Village
                                                        </label>
                                                        <select name="village_id" required class="form-control">
                                                            <option value="" selected="" disabled="">
                                                                Select Village
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputPassword1">
                                                            Notes
                                                        </label>
                                                        <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button text-right">
                                                            Payment Step
                                                        </button>
                                                        </form>
                                                    </div>
                                            </div>

                                        </div>			
                                    </div>
                                    
                                </div>

                            </div>					
                        </div>

                    </div>

                    <div class="col-md-4">
                        
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $cart)
                                                <li> 
                                                    <strong>Image: </strong>
                                                    <img src="{{ asset($cart->options->image) }}" style="height: 50px; width: 50px;">
                                                </li>
                                                <li> 
                                                    <strong>Qty: </strong>
                                                    ( {{ $cart->qty }} )

                                                    <strong>Color: </strong>
                                                    {{ $cart->options->color }}

                                                    <strong>Size: </strong>
                                                    {{ $cart->options->size }}
                                                </li>
                                            @endforeach 
                                            <hr>
                                            <li>
                                                @if(Session::has('coupon'))

                                                    <strong>SubTotal: </strong> ${{ $totals }} <hr>

                                                    <strong>Coupon Name : </strong> {{ session()->get('coupon')['name'] }}
                                                    ( {{ session()->get('coupon')['discount'] }} % )
                                                    <hr>

                                                    <strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
                                                    <hr>

                                                    <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
                                                    <hr>

                                                @else

                                                    <strong>SubTotal: </strong> ${{ $totals }} <hr>

                                                    <strong>Grand Total : </strong> ${{ $totals }} <hr>


                                                @endif
                                            </li>
                                        </ul>		
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>

                </div>
            </div>
        </div>
    </div>

     <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="province_id"]').on('change', function(){
                var province_id = $(this).val();
                if(province_id) {
                    $.ajax({
                        url: "{{  url('/get-regency/ajax') }}/"+province_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="district_id"]').empty(); 
                            $('select[name="village_id"]').empty(); 
                        var d =$('select[name="regency_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="regency_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name="regency_id"]').on('change', function(){
                var regency_id = $(this).val();
                if(regency_id) {
                    $.ajax({
                        url: "{{  url('/get-district/ajax') }}/" + regency_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name="district_id"]').on('change', function(){
                var district_id = $(this).val();
                if(district_id) {
                    $.ajax({
                        url: "{{  url('/get-village/ajax') }}/" + district_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="village_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="village_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

@endsection