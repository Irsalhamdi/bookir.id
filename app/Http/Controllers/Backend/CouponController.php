<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function index(){

        $data = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.index', compact('data'));
    }

    public function store(Request $request){
        
        Coupon::insert([
            'name' => strtoupper($request->name),
            'discount' => $request->discount,
            'validity' => $request->validity,
            'created_at' => Carbon::now()
        ]);

        $notification = [
            'message' => 'Coupon Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $data = Coupon::findOrFail($id);
        return view('backend.coupon.edit', compact('data'));
    }

    public function update(Request $request){

        Coupon::findOrFail($request->id)->update([
            'name' => strtoupper($request->name),
            'discount' => $request->discount,
            'validity' => $request->validity,
            'updated_at' => Carbon::now()
        ]);

        $notification = [
            'message' => 'Coupon Updated Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.coupons')->with($notification);
    }

    public function destroy($id){

        Coupon::findOrFail($id)->delete();

        $notification = [
            'message' => 'Coupon Deleted Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
