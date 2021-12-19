<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class MyCartController extends Controller
{
    public function index(){

        return view('frontend.cart.index');
    }

    public function GetCart(){

        $carts = Cart::content();
        $quantities = Cart::count();
        $totals = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'quantities' => $quantities,
            'totals' => round($totals),
        ));        
    }

    public function destroy($rowId){

        Cart::remove($rowId);

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        return response()->json(['success' => 'Successfully Remove From Cart']);
    }

    public function increment($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if(Session::has('coupon')){

            $name = Session::get('coupon')['name'];
            $data = Coupon::where('name', $name)->first();

            Session::put('coupon', [
                'name' => $data->name,
                'discount' => $data->discount,
                'discount_amount' => round(Cart::total() * $data->discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $data->discount / 100)
            ]);
        }

        return response()->json('increment');
    }

    public function decrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if(Session::has('coupon')){

            $name = Session::get('coupon')['name'];
            $data = Coupon::where('name', $name)->first();

            Session::put('coupon', [
                'name' => $data->name,
                'discount' => $data->discount,
                'discount_amount' => round(Cart::total() * $data->discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $data->discount / 100)
            ]);
        }

        return response()->json('decrement');
    }

    public function CouponApply(Request $request){

        $data = Coupon::where('name', $request->name)->where('validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if($data){

            Session::put('coupon', [
                'name' => $data->name,
                'discount' => $data->discount,
                'discount_amount' => round(Cart::total() * $data->discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $data->discount / 100)
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Apply Successfully'
            ));

        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

    public function CouponCalculation(){

        if(Session::has('coupon')){

            return response()->json(array(
                'subtotal' => Cart::total(),
                'name' => session()->get('coupon')['name'],
                'discount' => session()->get('coupon')['discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    }

    public function CouponRemove(){

        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfullly']);
    }
}
