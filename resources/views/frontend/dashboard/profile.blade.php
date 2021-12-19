@extends('frontend.main_master')

@section('title')
	Profile
@endsection

@section('content')

	<div class="body-content">
		<div class="container">
			<div class="row">

				@include('frontend.common.sidebar');

				<div class="col-md-2"></div>
				
				<div class="col-md-6">
					<br><br>
					<div class="card">
						<div class="card-body">
							<form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">							
									<div class="col-md-12">
										<div class="form-group text-center">
											<div class="controls">
												<img id="showImage" src="{{ (!empty($data->profile_photo_path)) ? url('upload/user_images/' .$data->profile_photo_path) : url('upload/default.jpg') }}" width="100" height="100">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<h5>Profile Images</h5>
											<div class="controls">
												<input id="image" type="file" name="profile_photo_path" class="form-control"> 
											</div>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<h5>Username</h5>
											<div class="controls">
												<input type="text" name="name" class="form-control" value="{{ $data->name }}" required> 
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<h5>Email</h5>
											<div class="controls">
												<input type="email" name="email" class="form-control" value="{{ $data->email }}" required> 
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<h5>Phone</h5>
											<div class="controls">
												<input type="text" name="phone" class="form-control" value="{{ $data->phone }}" required> 
											</div>
										</div>
									</div>
								</div>
								<div class="text-xs-right">
									<button type="submit" class="btn btn-rounded btn-success mb-5">
										Submit
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			
			</div>	
			<div class="row">
				
				<div class="col-md-4"></div>

				<div class="col-md-6">
					<form action="{{ route('user.change.password') }}" method="POST">
						@csrf
						<div class="form-group">
							<h5>Current Password</h5>
							<div class="controls">
								<input type="password" id="current_password" name="oldpassword" class="form-control" required> 
							</div>
						</div>
						<div class="form-group">
							<h5>New Password</h5>
							<div class="controls">
								<input type="password" id="password" name="password" class="form-control" required> 
							</div>
						</div>
						<div class="form-group">
							<h5>New Password Confirm</h5>
							<div class="controls">
								<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required> 
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-rounded btn-success mb-5">
								Submit
							</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>