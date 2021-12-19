@extends('admin.admin_master')

@section('admin')

	<div class="container-full">
		<section class="content">

			<div class="box">
				<div class="box-header with-border">
					<h4 class="cox-title">Edit Profile</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-12">
							<form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">							
									<div class="col-md-12">
										<div class="form-group text-center">
											<div class="controls">
												<img id="showImage" src="{{ (!empty($data->profile_photo_path)) ? url('upload/admin_images/' . $data->profile_photo_path) : url('upload/default.jpg') }}" width="100" height="100">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<h5>Profile Images</h5>
											<div class="controls">
												<input id="image" type="file" name="profile_photo_path" class="form-control" required> 
											</div>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<h5>Username</h5>
											<div class="controls">
												<input type="text" name="name" class="form-control" value="{{ $data->name }}" required> 
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<h5>Email</h5>
											<div class="controls">
												<input type="email" name="email" class="form-control" value="{{ $data->email }}" required> 
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

			<div class="box">
				<div class="box-header with-border">
					<h4 class="cox-title">Change Password</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-12">
							<form action="{{ route('admin.change.password') }}" method="POST">
								@csrf
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<h5>Current Password</h5>
											<div class="controls">
												<input type="password" id="current_password" name="oldpassword" class="form-control" required> 
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<h5>New Password</h5>
											<div class="controls">
												<input type="password" id="password" name="password" class="form-control" required> 
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<h5>New Password Confirm</h5>
											<div class="controls">
												<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required> 
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

		</section>
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