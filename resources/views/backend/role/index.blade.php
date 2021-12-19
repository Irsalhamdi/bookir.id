@extends('admin.admin_master')

@section('admin')

	<div class="container-full">
		<section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Total Admin User</h3>
                            <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right;">Add Admin User</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image  </th>
                                            <th>Name  </th>
                                            <th>Email </th> 
                                            <th>Access </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admins as $admin)
                                            <tr>
                                                <td> 
                                                    <img src="{{ asset($admin->profile_photo_path) }}" style="width: 50px; height: 50px;"> 
                                                </td>
                                                <td> {{ $admin->name }} </td>
                                                <td> {{ $admin->email  }} </td>
                                                <td>
                                                    @if($admin->brand == 1)
                                                        <span class="badge btn-primary">Brand</span>
                                                    @else
                                                    @endif

                                                     @if($admin->category == 1)
                                                        <span class="badge btn-secondary">Category</span>
                                                    @else
                                                    @endif

                                                    @if($admin->products == 1)
                                                        <span class="badge btn-success">Product</span>
                                                    @else
                                                    @endif

                                                    @if($admin->sliders == 1)
                                                        <span class="badge btn-danger">Slider</span>
                                                    @else
                                                    @endif

                                                    @if($admin->coupon == 1)
                                                        <span class="badge btn-warning">Coupons</span>
                                                    @else
                                                    @endif

                                                    @if($admin->blog == 1)
                                                        <span class="badge btn-light">Blog</span>
                                                    @else
                                                    @endif

                                                    @if($admin->settings == 1)
                                                        <span class="badge btn-dark">Setting</span>
                                                    @else
                                                    @endif

                                                    @if($admin->returnorder == 1)
                                                        <span class="badge btn-primary">Return Order</span>
                                                    @else
                                                    @endif

                                                    @if($admin->review == 1)
                                                        <span class="badge btn-secondary">Review</span>
                                                    @else
                                                    @endif

                                                    @if($admin->order == 1)
                                                        <span class="badge btn-success">Orders</span>
                                                    @else
                                                    @endif

                                                    @if($admin->stock == 1)
                                                        <span class="badge btn-danger">Stock</span>
                                                    @else
                                                    @endif

                                                     @if($admin->report == 1)
                                                        <span class="badge btn-warning">Reports</span>
                                                    @else
                                                    @endif

                                                    @if($admin->users == 1)
                                                        <span class="badge btn-info">Alluser</span>
                                                    @else
                                                    @endif

                                                    @if($admin->adminuserrole == 1)
                                                        <span class="badge btn-dark">Adminuserrole</span>
                                                    @else
                                                    @endif
                                                </td>
                                                <td width="25%">
                                                    <a href="{{ route('edit.admin.user', $admin->id) }}" class="btn btn-info" title="Edit Data">
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
                                                    <a href="{{ route('delete.admin.user', $admin->id) }}" class="btn btn-danger" title="Delete">
                                                        <i class="fa fa-trash"></i>
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