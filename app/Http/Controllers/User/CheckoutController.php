<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request){
        
        $data = [
            'name' => $request->name,
    	    'email' => $request->email,
    	    'phone' => $request->phone,
    	    'post_code' => $request->zip_code,
    	    'province_id' => $request->province_id,
    	    'regency_id' => $request->regency_id,
    	    'district_id' => $request->district_id,
    	    'village_id' => $request->village_id,
    	    'notes' => $request->notes,
        ];

        $totals = Cart::total();

    	return view('frontend.payment.index',compact('data', 'totals'));
    }

    public function GetRegency($province_id){
        
        $regency = Regency::where('province_id', $province_id)->orderBy('name', 'ASC')->get();
        return json_encode($regency);
    }

    public function GetDisctrict($regency_id){

        $district = District::where('regency_id', $regency_id)->orderBy('name', 'ASC')->get();
        return json_encode($district);
    }

    public function GetVillage($district_id){

        $village = Village::where('district_id', $district_id)->orderBy('name', 'ASC')->get();
        return json_encode($village);
    }
}
