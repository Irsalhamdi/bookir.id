<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request){

    	$product = $request->product_id;

    	Review::insert([
    		'product_id' => $product,
    		'user_id' => Auth::id(),
    		'comment' => $request->comment,
    		'summary' => $request->summary,
			'rating' => $request->quality,			
    		'created_at' => Carbon::now(),
    	]);

		return redirect()->back();
    }

	public function pending(){

    	$review = Review::where('status',0)->orderBy('id','DESC')->get();
    	return view('backend.review.pending', compact('review'));
    }

    public function approve($id){

    	Review::where('id',$id)->update(['status' => 1]);
        return redirect()->back();
    } 

	public function publish(){

    	$review = Review::where('status',1)->orderBy('id','DESC')->get();
    	return view('backend.review.publish', compact('review'));
    }

    public function delete($id){

    	Review::findOrFail($id)->delete();
        return redirect()->back();
    }
}
