<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function proccess(Request $request){
		
        if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}

		$code = 'STORE-' . mt_rand(000000, 999999);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'province_id' => $request->province_id,
     	    'regency_id' => $request->regency_id,
     	    'district_id' => $request->district_id,
     	    'village_id' => $request->village_id,
     	    'name' => $request->name,
     	    'email' => $request->email,
     	    'phone' => $request->phone,
     	    'post_code' => $request->post_code,
     	    'notes' => $request->notes,
            'invoice_no' => $code,
			'amount' => $total_amount,
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),	
        ]);

		$invoice = Order::findOrFail($order_id);
		$data = [
			'invoice_no' => $invoice->invocice_no,
			'amount' => $total_amount,
			'name' => $invoice->name,
			'email' => $invoice->email
		];

		Mail::to($request->email)->send(new OrderMail($data));

        $carts = Cart::content();

        foreach ($carts as $cart) {
     	    OrderItem::insert([
     	        'order_id' => $order_id, 
    	        'product_id' => $cart->id,
 		        'color' => $cart->options->color,
     		    'size' => $cart->options->size,
     		    'qty' => $cart->qty,
     	        'price' => $cart->price,
    	        'created_at' => Carbon::now(),
 	        ]);
        }

		Config::$serverKey = config('services.midtrans.serverKey');
		Config::$isProduction = config('services.midtrans.isProduction');
		Config::$isSanitized = config('services.midtrans.isSanitized');
		Config::$is3ds = config('services.midtrans.is3ds');

		$midtrans = [
			'transaction_details' => [
				'order_id' => $code,
				'gross_amount' => (int)$total_amount,
			],
			'customer_details' => [
				'first_name' => $invoice->name,
				'email' => $invoice->email,
			],
			'enabled_payments' => [
				'gopay', 'permata_va', 'bank_transfer'
			],
			'vtweb' => []
		];

		try {
			$paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
			return redirect($paymentUrl);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

		if (Session::has('coupon')) {
     	    Session::forget('coupon');
        }

		Cart::destroy();

		return redirect()->route('dashboard');
    }
}
