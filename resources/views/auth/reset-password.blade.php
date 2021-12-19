@extends('frontend.main_master')

@section('title')
	Reset Password
@endsection

@section('content')

    <div class="breadcrumb">
	    <div class="container">
		    <div class="breadcrumb-inner">
			    <ul class="list-inline list-unstyled">
				    <li>
                        <a href="/">Home</a>
                    </li>
				    <li class='active'>
						<a>Reset Password</a>
					</li>
			    </ul>
		    </div>
	    </div>
    </div>

    <div class="body-content">
	    <div class="container">
		    <div class="sign-in-page">
			    <div class="row">	
                    <div class="col-md-6 col-sm-6 sign-in">
	                    <h4 class="">Reset Password</h4>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf                        
		                    <div class="form-group">
		                        <label class="info-title" for="email">Email Address</label>
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
		                        <input type="email" name="email" id="email" class="form-control unicase-form-control text-input">
		                    </div>
		                    <div class="form-group">
		                        <label class="info-title" for="email">Password</label>
		                        <input type="password" name="password" id="password" class="form-control unicase-form-control text-input">
		                    </div>
		                    <div class="form-group">
		                        <label class="info-title" for="email">Confirm Password</label>
		                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control unicase-form-control text-input">
		                    </div>
	  	                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
	                    </form>					
                    </div>
                </div>
		    </div>
        </div>
    </div>
    
@endsection
