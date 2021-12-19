<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlisht;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){

        return view('frontend.wishlist.index');
    }

    public function GetWishlist(){

		$wishlist = Wishlisht::with('product')->where('user_id',Auth::id())->latest()->get();
		return response()->json($wishlist);
    }

    public function store(Request $request, $product_id){

        if(Auth::check()){
            
            $exist = Wishlisht::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            
            if(empty($exist)){

                Wishlisht::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);

                return response()->json(['success' => 'Successfully Added On Your Wishlist']);

            }else{
                return response()->json(['error' => 'This Product has Already on Your Wishlist']);
            }
            
        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

    public function destroy($id){

        Wishlisht::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully Product Remove']);
    }
}
