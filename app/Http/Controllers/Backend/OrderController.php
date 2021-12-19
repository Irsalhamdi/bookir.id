<?php

namespace App\Http\Controllers\Backend;

use PDF;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function pending(){

        $data = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('backend.order.pending', compact('data'));
    }

    public function detail($id){

        $order = Order::with('user', 'province', 'regency', 'district', 'village')->where('id', $id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id', $id)->orderBy('id','DESC')->get();
    	return view('backend.order.detail', compact('order','orderItem'));
    }

    public function confirmed(){

		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('backend.order.confirmed', compact('orders'));
	}

	public function processing(){

		$orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('backend.order.processing', compact('orders'));
	}
 
	public function picked(){

		$orders = Order::where('status','picked')->orderBy('id','DESC')->get();
		return view('backend.order.picked', compact('orders'));
	}

	public function shipped(){

		$orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
		return view('backend.order.shipped', compact('orders'));
	}

	public function delivered(){

		$orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
		return view('backend.order.delivered', compact('orders'));
	}

	public function cancelled(){

		$orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
		return view('backend.order.cancelled', compact('orders'));
	}

    public function pendingtoconfirm($id){

        Order::findOrFail($id)->update(['status' => 'confirm']);

	    $notification = [
            'message' => 'Order Status Updated Successfully',
            'alert-type' => 'success'
        ];

		return redirect()->route('pending.order')->with($notification);
	} 

    public function confirmtoprocessing($id){

        Order::findOrFail($id)->update(['status' => 'processing']);

	    $notification = [
            'message' => 'Order Status Updated Successfully',
            'alert-type' => 'success'
        ];

		return redirect()->route('confirmed.order')->with($notification);
	} 

    public function processingtopicked($id){

        Order::findOrFail($id)->update(['status' => 'picked']);

	    $notification = [
            'message' => 'Order Status Updated Successfully',
            'alert-type' => 'success'
        ];

		return redirect()->route('processing.order')->with($notification);
	} 

    public function pickedtoshipped($id){

        Order::findOrFail($id)->update(['status' => 'shipped']);

	    $notification = [
            'message' => 'Order Status Updated Successfully',
            'alert-type' => 'success'
        ];

		return redirect()->route('picked.order')->with($notification);
	} 

    public function shippedtodelivered($id){

		$products = OrderItem::where('order_id', $id)->get();

		foreach($products as $product){
			Product::where('id', $product->product_id)->update(['qty' => DB::raw('qty-'.$product->qty)]);
		}

        Order::findOrFail($id)->update(['status' => 'delivered']);

		$notification = [
            'message' => 'Order Status Updated Successfully',
            'alert-type' => 'success'
        ];

		return redirect()->route('shipped.order')->with($notification);
	} 

	public function invoice($id){

		$order = Order::with('user', 'province', 'regency', 'district', 'village')->where('id', $id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id', $id)->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('backend.order.invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');
	}
}
