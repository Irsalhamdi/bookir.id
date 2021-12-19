<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function Profile(){
        
        $data = Admin::find(Auth::user()->id);
        return view('admin.profile', compact('data'));
    }

    public function EditProfile(){

        $data = Admin::find(Auth::user()->id);
        return view('admin.edit_profile', compact('data'));
    }

    public function store(Request $request){
        
        $data = Admin::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){

            $file = $request->file('profile_photo_path');

            if($data->profile_photo_path){

                unlink(public_path('upload/admin_images/' .$data->profile_photo_path));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'), $filename);
                $data['profile_photo_path'] = $filename;

            }else{
                
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'), $filename);
                $data['profile_photo_path'] = $filename;
            }
        }

        $data->save();

        $notification = [
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.profile')->with($notification);

    }

    public function ChangePassword(Request $request){

        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassowrd = Auth::user()->password;

        if(Hash::check($request->oldpassword, $hashedPassowrd)){

            if(Hash::check($request->password, $hashedPassowrd)){

                return redirect()->back()->with('message', 'Current password can not be the same with new password');

            }else{

                $data = Admin::find(Auth::id());
                $data->password  = Hash::make($request->password);
                $data->save();
                Auth::logout();

                $notification = [
                    'message' => 'Password Changed Successfully',
                    'alert-type' => 'success'
                ];

                return redirect()->route('admin.login')->with($notification);

            }   

        }else{

            $notification = [
                'message' => 'Password Invalid',
                'alert-type' => 'warning'
            ];

            return redirect()->back();
        }
    }

    public function users(){

        $users = User::latest()->get();
        return view('backend.user.index', compact('users'));
    }
}
