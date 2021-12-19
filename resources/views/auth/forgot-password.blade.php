@extends('frontend.main_master')

@section('title')
	Forgot Password
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
						<a href="{{ route('login') }}">Login</a>
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
	                    <h4 class="">Forget Password</h4>
	                    <p class="">Hello, Reset Your Password.</p>
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">                        
                            @csrf
		                    <div class="form-group">
		                        <label class="info-title" for="email">Email Address</label>
		                        <input type="email" name="email" id="email" class="form-control unicase-form-control text-input" :value="old('email')" required autofocus>
		                    </div>
	  	                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>
	                    </form>					
                    </div>
                </div>
		    </div>
        </div>
    </div>
    
@endsection