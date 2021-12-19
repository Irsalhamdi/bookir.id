<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(){

    	$admins = Admin::where('type',2)->latest()->get();
	    return view('backend.role.index', compact('admins'));
    }

    public function create(){
    	return view('backend.role.add');
    }

    public function store(Request $request){

    	$image = $request->file('profile_photo_path');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    	$save_url = 'upload/admin_images/'.$name_gen;

	    Admin::insert([
		    'name' => $request->name,
		    'email' => $request->email,
		    'password' => Hash::make($request->password),
		    'phone' => $request->phone,
		    'brand' => $request->brand,
		    'category' => $request->category,
		    'products' => $request->product,
		    'sliders' => $request->slider,
		    'coupon' => $request->coupons,
		    'blog' => $request->blog,
		    'settings' => $request->setting,
		    'returnorder' => $request->returnorder,
		    'review' => $request->review,
		    'order' => $request->orders,
		    'stock' => $request->stock,
		    'report' => $request->reports,
		    'users' => $request->alluser,
		    'adminuserrole' => $request->adminuserrole,
		    'type' => 2,
		    'profile_photo_path' => $save_url,
		    'created_at' => Carbon::now(),
        ]);

		$notification = [
            'message' => 'Admin Created Successfully',
            'alert-type' => 'success'
        ];

		return redirect()->route('all.admin.user')->with($notification);
    }

    public function edit($id){

    	$admin = Admin::findOrFail($id);
    	return view('backend.role.edit', compact('admin'));
    } 

    public function update(Request $request){

    	$admin_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('profile_photo_path')) {

    		unlink($old_img);
    		$image = $request->file('profile_photo_path');
    		$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    		Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    		$save_url = 'upload/admin_images/'.$name_gen;

			Admin::findOrFail($admin_id)->update([
				'name' => $request->name,
				'email' => $request->email,
				'phone' => $request->phone,
				'brand' => $request->brand,
				'category' => $request->category,
				'products' => $request->product,
				'sliders' => $request->slider,
				'coupon' => $request->coupons,
				'blog' => $request->blog,
				'settings' => $request->setting,
				'returnorder' => $request->returnorder,
				'review' => $request->review,
				'order' => $request->orders,
				'stock' => $request->stock,
				'report' => $request->reports,
				'users' => $request->alluser,
				'adminuserrole' => $request->adminuserrole,
				'type' => 2,
				'profile_photo_path' => $save_url,
				'updated_at' => Carbon::now(),
			]);

	        $notification = [
                'message' => 'Admin Updated Successfully',
                'alert-type' => 'success'
            ];

		    return redirect()->route('all.admin.user')->with($notification);
    	}else{
    	    Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
		        'email' => $request->email,
		        'phone' => $request->phone,
		        'brand' => $request->brand,
		        'category' => $request->category,
		        'products' => $request->product,
		        'sliders' => $request->slider,
		        'coupon' => $request->coupons,
		        'blog' => $request->blog,
		        'settings' => $request->setting,
		        'returnorder' => $request->returnorder,
		        'review' => $request->review,
		        'order' => $request->orders,
		        'stock' => $request->stock,
		        'report' => $request->reports,
		        'users' => $request->alluser,
		        'adminuserrole' => $request->adminuserrole,
		        'type' => 2,
		        'updated_at' => Carbon::now(),
    	    ]);

		    $notification = [
                'message' => 'Admin Updated Successfully',
                'alert-type' => 'success'
            ];

		    return redirect()->route('all.admin.user')->with($notification);
    	} 
    }

    public function destroy($id){

 		$adminimg = Admin::findOrFail($id);
 		$img = $adminimg->profile_photo_path;

		if($img){
			unlink($img);
		}else{

			Admin::findOrFail($id)->delete();

			$notification = [
				'message' => 'Admin Deleted Successfully',
				'alert-type' => 'success'
			];

			return redirect()->back()->with($notification);
		}	
 	}
}
