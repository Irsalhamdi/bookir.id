<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(){

        $carts = Cart::content();
        $quantities = Cart::count();
        $totals = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'quantities' => $quantities,
            'totals' => round($totals),
        ));
    }

    public function store(Request $request, $id){

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        $product = Product::findOrFail($id);

        if($product->discount == NULL){

            Cart::add([

                'id' => $id,
                'name' => $request->name,
                'qty' => $request->quantity,
                'price' => $product->price,
                'weight' => 1,
                'options' => [
                    'image' => $product->thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);

        }else{

            Cart::add([
                'id' => $id,
                'name' => $request->name,
                'qty' => $request->quantity,
                'price' => $product->discount,
                'weight' => 1,
                'options' => [
                    'image' => $product->thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);

        }
    }

    public function destroy($rowId){

        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);
    }

    public function CheckoutCreate(){

        if(Auth::check()){
            if(Cart::total() > 0){
                $carts = Cart::content();
                $quantities = Cart::count();
                $totals = Cart::total();
                $provinces = Province::orderBy('name','ASC')->get();

                return view('frontend.checkout.index',compact('carts','quantities','totals', 'provinces'));
            }else{
                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );  
                return redirect()->to('/');
            }
        }else{  
            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );
            return redirect()->route('login');
        }
    }
}
