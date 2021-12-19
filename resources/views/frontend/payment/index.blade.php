@extends('frontend.main_master')

@section('title')
    Stripe Payment
@endsection

@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>Stripe</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel-group checkout-steps" id="accordion">
                            <div class="panel panel-default checkout-step-01">
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">

                                        <h4 class="unicase-checkout-title">
                                            Your Shopping Amount
                                        </h4>
                                        <hr>
                                        <ul class="nav nav-checkout-progress list-unstyled">
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

                                        <form action="{{ route('payment') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" name="name" value="{{ $data['name'] }}">
                                                <input type="hidden" name="email" value="{{ $data['email'] }}">
                                                <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                                                <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                                <input type="hidden" name="province_id" value="{{ $data['province_id'] }}">
                                                <input type="hidden" name="regency_id" value="{{ $data['regency_id'] }}">
                                                <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                                <input type="hidden" name="village_id" value="{{ $data['village_id'] }}">
                                                <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 
                                            </div>
                                            <button type="submit" class="btn btn-primary">Processed to Payment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection