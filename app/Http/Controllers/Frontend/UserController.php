<?php

namespace App\Http\Controllers\Frontend;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\MultiImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPost;
use App\Http\Controllers\Controller;
use App\Models\SubSUbCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $fashion_id = Category::where('slug', 'fashion')->first();
        $electronic_id = Category::where('slug', 'electronics')->first();
        $categories = Category::orderBy('name', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $features = Product::where('features', '1')->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals', '1')->where('discount', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
        $special_offers = Product::where('special_offer', '1')->orderBy('id', 'DESC')->limit(6)->get();
        $special_deals = Product::where('special_deals', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $fashions = Product::where('status', 1)->where('category_id', $fashion_id->id)->orderBy('id', 'DESC')->get();
        $electronics = Product::where('status', 1)->where('category_id', $electronic_id->id)->orderBy('id', 'DESC')->get();
        $blogs = BlogPost::orderBy('title', 'ASC')->get();

        return view('frontend.index', compact('categories', 'sliders', 'products', 'features', 'hot_deals', 'special_offers', 'special_deals', 'fashions', 'electronics', 'blogs'));
    }

    public function profile(){
        
        $data = User::find(Auth::user()->id);
        return view('frontend.dashboard.profile', compact('data'));
    }

    public function store(Request $request){

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){

            $file = $request->file('profile_photo_path');

            if($data->profile_photo_path){

                unlink(public_path('upload/user_images/' .$data->profile_photo_path));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $data['profile_photo_path'] = $filename;

            }else{
                
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $data['profile_photo_path'] = $filename;
            }
        }
        
        $data->save();
        return redirect()->route('dashboard');
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login');
    }

    public function ChangePassword(Request $request){
        
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);


        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldpassword, $hashedPassword)){

            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');

        }else{
            
            return redirect()->back();
        }
    }

    public function detail($id){
        
        $product = Product::findOrFail($id);
        $images = MultiImage::where('product_id', $id)->get();
        $colors = explode(',', $product->color);
        $sizes = explode(',', $product->size);
        $relates = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        return view('frontend.products.products-details', compact('product', 'images', 'colors', 'sizes', 'relates'));
    }

    public function tag($tags){

        $categories = Category::orderBy('name', 'ASC')->get();
        $products = Product::where('status', 1)->where('tags', $tags)->orderBy('id', 'DESC')->paginate(3);

        return view('frontend.products.products-tags', compact('categories', 'products'));
    }

    public function subcategory(Request $request, $subcategory_id, $slug){

        $categories = Category::orderBy('name', 'ASC')->get();
        $products = Product::where('status', 1)->where('subcategory_id', $subcategory_id)->orderBy('id', 'DESC')->paginate(3);
        $breadcrumbs = SubCategory::with('category')->where('id', $subcategory_id)->get();

        if ($request->ajax()) {
            $grid_view = view('frontend.products.grid_view_product', compact('products'))->render();
            $list_view = view('frontend.products.list_view_product', compact('products'))->render();

	        return response()->json([
                'grid_view' => $grid_view, 
                'list_view',$list_view
            ]);
        }
        return view('frontend.products.products-subcategories', compact('categories', 'products', 'breadcrumbs'));
    }

    public function subsubcategory($subsubcategory_id, $slug){

        $categories = Category::orderBy('name', 'ASC')->get();
        $products = Product::where('status', 1)->where('subsubcategory_id', $subsubcategory_id)->orderBy('id', 'DESC')->paginate(6);
        $breadcrumbs = SubSUbCategory::with(['category', 'subcategory'])->where('id', $subsubcategory_id)->get();
        return view('frontend.products.products-subsubcategories', compact('categories', 'products', 'breadcrumbs'));        
    }

    public function modal($id){

        $product = Product::with('brand', 'category')->findOrFail($id);
        $color = explode(',', $product->color);
        $size = explode(',', $product->size);
        
        return response()->json(array(
            'product' => $product,
            'color' => $color,
            'size' => $size
        )); 
    }

    public function MyOrders(){

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('frontend.dashboard.my-orders', compact('orders'));
    }

    public function DetailOrder($id){

        $order = Order::with('user', 'province', 'regency', 'district', 'village')->where('id', $id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();
        return view('frontend.dashboard.detail-order', compact('order', 'orderItem'));
    }

    public function invoice($id){
        
        $order = Order::with('user', 'province', 'regency', 'district', 'village')->where('id', $id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();
        
        $pdf = PDF::loadView('frontend.dashboard.invoice-order',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');
    }

    public function return(Request $request, $id){

        Order::findOrFail($id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);

        $notification = [
            'message' => 'Return Request send Sucessfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('my-orders')->with($notification);
    }

    public function ReturnOrderList(){

        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id','DESC')->get();
        return view('frontend.dashboard.return-order', compact('orders'));
    }

    public function CancelOrders(){

        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.dashboard.cancel-order', compact('orders'));        
    }

    public function tracking(Request $request){
        
        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();
        if ($track) {
            return view('frontend.tracking.index', compact('track'));
        }else{
            return redirect()->back();
        }
    }

    public function search(Request $request){
        $request->validate(["search" => "required"]);
        $data = $request->search;
		$products = Product::where('name', 'LIKE', "%$data%")->select('name', 'thumbnail')->limit(5)->get();
		return view('frontend.products.products-search', compact('products'));
    }

    public function SearchProduct(Request $request){

        $request->validate(["search" => "required"]);

		$item = $request->search;		 

		$products = Product::where('name','LIKE',"%$item%")->select('name','thumbnail')->limit(5)->get();
		return view('frontend.products.search',compact('products'));
    }

    public function about(){

        return view('frontend.about.index');
    }

}
