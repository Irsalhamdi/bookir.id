@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp

<div class="col-md-2 text-center mt-2"><br><br>
	<img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'. $user->profile_photo_path) : url('upload/default.jpg') }}" height="50" width="50%"><br><br>
    <ul>
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Update Profile</a>
        <a href="{{ route('my-orders') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div>