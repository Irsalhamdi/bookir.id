<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\BloggedController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\MyCartController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ReviewController;
use App\Models\Wishlisht;

Route::get('/', [UserController::class, 'index']);

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
    Route::get('admin/profile', [AdminProfileController::class, 'Profile'])->name('admin.profile');
    Route::get('admin/profile/edit', [AdminProfileController::class, 'EditProfile'])->name('admin.profile.edit');
    Route::post('admin/profile/store/', [AdminProfileController::class, 'store'])->name('admin.profile.store');
    Route::post('admin/profile/change-password/', [AdminProfileController::class, 'ChangePassword'])->name('admin.change.password');
    Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
});

Route::prefix('brand')->group(function(){
    Route::get('/all', [BrandController::class, 'index'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'store'])->name('add.brand');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit.brand');
    Route::post('/update', [BrandController::class, 'update'])->name('update.brand');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('delete.brand');
});

Route::prefix('category')->group(function(){
    Route::get('/all', [CategoryController::class, 'index'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'store'])->name('add.category');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');
    Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('all.sub.category');
    Route::post('/add-sub-category', [SubCategoryController::class, 'store'])->name('add.sub.category');
    Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'edit'])->name('edit.sub.category');
    Route::post('/update-sub-category', [SubCategoryController::class, 'update'])->name('update.sub.category');
    Route::get('/delete-sub-category/{id}', [SubCategoryController::class, 'destroy'])->name('delete.sub.category');
    Route::get('/sub-sub-category', [SubSubCategoryController::class, 'index'])->name('all.sub.sub.category');
    Route::post('/add-sub-sub-category', [SubSubCategoryController::class, 'store'])->name('add.sub.sub.category');
    Route::get('/edit-sub-sub-category/{id}', [SubSubCategoryController::class, 'edit'])->name('edit.sub.sub.category');
    Route::post('/update-sub-sub-category', [SubSubCategoryController::class, 'update'])->name('update.sub.sub.category');
    Route::get('/delete-sub-sub-category/{id}', [SubSubCategoryController::class, 'destroy'])->name('delete.sub.sub.category');
    Route::get('/subsubcategory/ajax/{category_id}', [SubSubCategoryController::class, 'subcategory']);
    Route::get('/sub-sub-category/ajax/{subcategory_id}', [SubSubCategoryController::class, 'subsubcategory']);
});

Route::prefix('products')->group(function(){
    Route::get('/all', [ProductController::class, 'index'])->name('all.products');
    Route::get('/add', [ProductController::class, 'create'])->name('add.products');
    Route::post('/store', [ProductController::class, 'store'])->name('store.products');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit.products');
    Route::post('/update', [ProductController::class, 'update'])->name('update.products');
    Route::post('/update/images', [ProductController::class, 'updateImages'])->name('update.images');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete.products');
});

Route::prefix('stock')->group(function (){
    Route::get('product', [ProductController::class, 'stock'])->name('product.stock');
});

Route::prefix('sliders')->group(function(){
    Route::get('/all', [SliderController::class, 'index'])->name('all.sliders');
    Route::post('/add', [SliderController::class, 'store'])->name('add.sliders');
    Route::get('edit/{id}', [SliderController::class, 'edit'])->name('edit.sliders');
    Route::post('/update', [SliderController::class, 'update'])->name('update.sliders');
    Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('delete.sliders');
    Route::get('active/{id}', [SliderController::class, 'active'])->name('active.sliders');
    Route::get('inactive/{id}', [SliderController::class, 'inactive'])->name('inactive.sliders');
});

Route::prefix('coupon')->group(function(){
    Route::get('/all', [CouponController::class, 'index'])->name('all.coupons');
    Route::post('/add-coupon', [CouponController::class, 'store'])->name('add.coupon');
    Route::get('/edit-coupon/{id}', [CouponController::class, 'edit'])->name('edit.coupon');
    Route::post('/update-coupon', [CouponController::class, 'update'])->name('update.coupon');
    Route::get('/delete-coupon/{id}', [CouponController::class, 'destroy'])->name('delete.coupon');
});

Route::prefix('order')->group(function(){
    Route::get('/pending', [OrderController::class, 'pending'])->name('pending.order');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');      
    Route::get('/pending-to-confirm/{id}', [OrderController::class, 'pendingtoconfirm'])->name('pending.to.confirm');  
    Route::get('/confirmed', [OrderController::class, 'confirmed'])->name('confirmed.order');
    Route::get('/confirm-to-processing/{id}', [OrderController::class, 'confirmtoprocessing'])->name('confirm.to.processing');
    Route::get('/processing', [OrderController::class, 'processing'])->name('processing.order');
    Route::get('/processing-to-picked/{id}', [OrderController::class, 'processingtopicked'])->name('processing.to.picked');
    Route::get('/picked', [OrderController::class, 'picked'])->name('picked.order');
    Route::get('/picked-to-shipped/{id}', [OrderController::class, 'pickedtoshipped'])->name('picked.to.shipped');
    Route::get('/shipped', [OrderController::class, 'shipped'])->name('shipped.order');
    Route::get('/shipped-to-delivered/{id}', [OrderController::class, 'shippedtodelivered'])->name('shipped.to.delivered');
    Route::get('/delivered', [OrderController::class, 'delivered'])->name('delivered.order');
    Route::get('/cancelled', [OrderController::class, 'cancelled'])->name('cancelled.order');
    Route::get('/invoice-downloads/{id}', [OrderController::class, 'invoice'])->name('order.invoice');    
});

Route::prefix('report')->group(function(){
    Route::get('/search', [ReportController::class, 'index'])->name('report.search');
    Route::post('/search/by-date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
    Route::post('/search/by-month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
    Route::post('/search/by-year', [ReportController::class, 'ReportByYear'])->name('search-by-year');    
});

Route::prefix('users')->group(function(){
    Route::get('/all', [AdminProfileController::class, 'users'])->name('users.all');
});

Route::prefix('adminuserrole')->group(function(){
    Route::get('/all', [AdminUserController::class, 'index'])->name('all.admin.user');
    Route::get('/add', [AdminUserController::class, 'create'])->name('add.admin');
    Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.store');
    Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit.admin.user');
    Route::post('/update', [AdminUserController::class, 'update'])->name('admin.user.update');  
    Route::get('/delete/{id}', [AdminUserController::class, 'destroy'])->name('delete.admin.user');      
});

Route::prefix('blog')->group(function(){
    Route::get('category', [BlogController::class, 'category'])->name('blog.category');
    Route::post('category-add', [BlogController::class, 'store'])->name('add.blog.category');
    Route::get('category-edit/{id}', [BlogController::class, 'edit'])->name('edit.blog.category');
    Route::post('category-update', [BlogController::class, 'update'])->name('update.blog.category');
    Route::get('category-delete/{id}', [BlogController::class, 'destroy'])->name('delete.blog.category');
    Route::get('post', [BlogController::class, 'post'])->name('blog.post');
    Route::get('post-add', [BlogController::class, 'AddPost'])->name('add.blog.post');
    Route::post('post-store', [BlogController::class, 'StorePost'])->name('store.blog.post');
    Route::get('post-edit/{id}', [BlogController::class, 'EditPost'])->name('edit.blog.post');
    Route::post('post-update', [BlogController::class, 'UpdatePost'])->name('update.blog.post');
    Route::get('post-delete/{id}', [BlogController::class, 'DeletePost'])->name('delete.blog.post');
});

Route::prefix('settings')->group(function(){
    Route::get('/site', [SettingController::class, 'index'])->name('site');
    Route::post('/site/update', [SettingController::class, 'update'])->name('update.site.setting');
    Route::get('/seo', [SettingController::class, 'seo'])->name('seo');
    Route::post('/seo/update', [SettingController::class, 'SeoUpdate'])->name('update.seo.setting');
});

Route::prefix('review')->group(function(){
    Route::get('/manage', [ReviewController::class, 'pending'])->name('pending.review');
    Route::get('/publish', [ReviewController::class, 'publish'])->name('publish.review');
    Route::get('/publish/{id}', [ReviewController::class, 'approve'])->name('approve.review');
    Route::get('/delete/{id}', [ReviewController::class, 'delete'])->name('delete.review');
});

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->name('dashboard');

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function(){
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'store'])->name('user.profile.store');
    Route::post('/profile/change-password', [UserController::class, 'ChangePassword'])->name('user.change.password');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::get('/get-wishlist', [WishlistController::class, 'GetWishlist']);
    Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'store']);
    Route::get('/remove-wishlist/{id}', [Wishlisht::class, 'destroy']);
    Route::get('/my-orders', [UserController::class, 'MyOrders'])->name('my-orders');
    Route::get('/my-orders/{id}', [UserController::class, 'DetailOrder'])->name('my-orders.detail');
    Route::get('/my-orders/cancelled-order-list', [UserController::class, 'CancelOrderList'])->name('my-orders.cancel.list');    
    Route::get('/my-orders/return-order-list', [UserController::class, 'ReturnOrderList'])->name('my-orders.return.list');    
    Route::post('/my-orders/return/{id}', [UserController::class, 'return'])->name('my-orders.return');    
    Route::get('my-orders/invoice-downloads/{id}', [UserController::class, 'invoice'])->name('my-orders.invoice');
    Route::post('/order/tracking', [UserController::class, 'tracking'])->name('order.tracking');  
});

Route::get('/about-me', [UserController::class, 'about'])->name('about-me');
Route::get('/blog-post', [BloggedController::class, 'index'])->name('blog');
Route::get('/blog-post/{slug}', [BloggedController::class, 'detail'])->name('blog.detail');
Route::get('/blog-post/category/{slug}/{id}', [BloggedController::class, 'category']);
Route::get('/cart', [MyCartController::class, 'index']);
Route::get('/get-cart', [MyCartController::class, 'GetCart']);
Route::get('/remove-cart/{rowId}', [MyCartController::class, 'destroy']);
Route::get('/increment-cart/{rowId}', [MyCartController::class, 'increment']);
Route::get('/decrement-cart/{rowId}', [MyCartController::class, 'decrement']);
Route::post('/coupon-apply', [MyCartController::class, 'CouponApply']); 
Route::get('/coupon-calculation', [MyCartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [MyCartController::class, 'CouponRemove']);
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
Route::post('/checkout-store', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/payment', [PaymentController::class, 'proccess'])->name('payment');
Route::get('/get-regency/ajax/{province_id}', [CheckoutController::class, 'GetRegency']);
Route::get('/get-district/ajax/{regency_id}', [CheckoutController::class, 'GetDisctrict']);
Route::get('/get-village/ajax/{district_id}', [CheckoutController::class, 'GetVillage']);
Route::get('product/details/{id}', [UserController::class, 'detail'])->name('product.details');
Route::get('product/tags/{tags}', [UserController::class, 'tag'])->name('product.tags');
Route::get('product/modal/{id}', [UserController::class, 'modal']);
Route::get('product/mini/cart', [CartController::class, 'index']);
Route::post('product/mini/cart-store/{id}', [CartController::class, 'store']);
Route::get('product/mini/cart-remove/{rowId}', [CartController::class, 'destroy']);
Route::post('/search', [UserController::class, 'search'])->name('product.search');
Route::post('search-product', [UserController::class, 'SearchProduct']);
Route::get('/shop', [ShopController::class, 'index'])->name('shop.page');
Route::post('/shop/filter', [ShopController::class, 'filter'])->name('shop.filter');
Route::get('subcategory/product/{subcategory_id}/{slug}', [UserController::class, 'subcategory']);
Route::get('subsubcategory/product/{subsubcategory_id}/{slug}', [UserController::class, 'subsubcategory']);
Route::post('review-store', [ReviewController::class, 'store'])->name('add.review');


