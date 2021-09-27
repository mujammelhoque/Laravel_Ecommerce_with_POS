<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ItemKitsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ReceivingController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\StoreconfigController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GiftcardController;
use App\Http\Controllers\ShopLoginController;
use App\Http\Controllers\ShopDashboardController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebUserDetailsController;
use App\Http\Controllers\UserMangementController;
use App\Http\Controllers\WebOrderController;

//Frontend Development  START
Route::get('/', [IndexController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/wishlist', [WishlistController::class, 'index']);
Route::get('wishlist/{id}', [WishlistController::class, 'add_wishlist'])->name("add.withlist");
Route::get('wishlist/{id}/del', [WishlistController::class, 'remove_wishlist'])->name("remove.wishlist");
Route::get('/cart', [CartController::class, 'index']);
Route::any('add/{id}/cart', [CartController::class, 'addToCart'])->name('add.cart');
Route::get('cart/{id}/destroy', [CartController::class, 'removeCart'])->name('remove.cart');
Route::post('cart/update', [CartController::class, 'update_cart'])->name('update.cart');
Route::get('/cart/{coupon}', [CartController::class, 'index'])->name('coupon');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('single.product');
Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout.product');
Route::post('/order', [ProductController::class, 'order'])->name('order.product')->middleware('webuser');

Route::get('/product/b/{id}', [ProductController::class, 'bundle_product'])->name('bundle.product');

//User Profile
Route::get('/profile', [WebUserDetailsController::class, 'index'])->name('user.profile');
Route::get('/profile/edit', [WebUserDetailsController::class, 'edit'])->name('edit.profile');
Route::post('/profile/update/user', [WebUserDetailsController::class, 'update'])->name('update.profile');
Route::get('/profile/order', [WebUserDetailsController::class, 'orderDetails'])->name('order.profile');
Route::post('order/cancel', [WebUserDetailsController::class, 'orderCancel'])->name('order.cancel');
Route::get('order/view/{id}', [WebUserDetailsController::class, 'orderView'])->name('order.view');
Route::post('order/invoice/download', [WebUserDetailsController::class, 'orderDownload'])->name('order.download');
Route::get('order/test', [WebUserDetailsController::class, 'test'])->name('test.view');

//Categories

Route::get('shop/category', [IndexController::class, 'category'])->name('category');
Route::get('/shop', [IndexController::class, 'shop'])->name('shop');
Route::get('shop/category/{id}', [IndexController::class, 'single_categorie'])->name('single.category');
Route::get('s/{search}', [IndexController::class, 'search'])->name('search');


//Frontend Development  END
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',[IndexController::class,'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/redirect', [HomeController::class, 'index']);

Route::middleware(['webuser'])->group(function () {
    Route::get('/testuser', function () {
        return view('welcome');
    });
});

Route::middleware(['admin'])->group(function () {
    Route::resource('mytest', TestController::class);
    Route::get('/anothertestlink', [TestController::class, 'anotherfunc']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //customer
    Route::resource('/customer', CustomerController::class);

    // Route::resource('/customer',CustomerController::class);
    //Route::get('/customer',[CustomerController::class,'index']);
    //Route::get('/customer/addnew',[CustomerController::class,'addnew']);
    Route::resource('category', CategoryController::Class);

    Route::put('editcategory/{id}', [CategoryController::class, 'editcategory']);



    // Route::get('/items',[ItemsController::class,'index']);
    // Route::get('items/new_item',[ItemsController::class,'newItem']);
    Route::get('/items', [ItemsController::class, 'index']);
    Route::get('items/new_item', [ItemsController::class, 'newItem']);
    Route::post('items/store', [ItemsController::class, 'store']);
    Route::get('items/edit/{item}', [ItemsController::class, 'edit']);
    Route::put('items/update/{item}', [ItemsController::class, 'update']);
    Route::delete('items/destroy/{item}', [ItemsController::class, 'destroy']);
    Route::post('items/destroy', [ItemsController::class, 'destroy_items'])->name('multi.delete');
    Route::get('items/attributes', [ItemsController::class, 'attributes'])->name('attributes');
    Route::match(['get', 'post'], 'items/attributes/add', [ItemsController::class, 'add_attributes'])->name('attributes.add');
    Route::post('items/attributes/update', [ItemsController::class, 'update_attributes'])->name('attributes.update');
    Route::post('items/attributes_n/update', [ItemsController::class, 'update_attributes_name'])->name('attributes_name.update');
    Route::get('items/attributes_n/delete/{id}', [ItemsController::class, 'delete_attributes_name'])->name('delete.attr_name');
    Route::get('items/attributes_v/delete/{id}', [ItemsController::class, 'delete_attributes_value'])->name('delete.attr_value');


    Route::get('generatebarcode/{id}', [ItemsController::class, 'GenerateBarcode']);


    //Item Kits Rabeya
    Route::get('itemkits', [ItemKitsController::class, 'index']);
    Route::get('itemkits/new', [ItemKitsController::class, 'new']);
    Route::post('itemkits/store', [ItemKitsController::class, 'store']);

    //Route::resource('/itemkits',ItemKitsController::class);

    //Route::resource('/itemkits',ItemKitsController::class);
    Route::resource('/suppliers', SuppliersController::class);
    Route::get('/reports', [ReportsController::class, 'index']);
    Route::match(['get','post'],'reports/graphical_{name}', [ReportsController::class, 'graphical_summary'])->name('graphical.summary');
    
    Route::get('reports/graphical_{name}/{start}/{end}/{sale}/{location}', [ReportsController::class, 'graphical_summary_sales']);
    Route::get('reports/summary_{name}', [ReportsController::class, 'summaryList']);
    Route::match(['get', 'post'], 'reports/detailed_{name}', [ReportsController::class, 'detailed']);
    Route::get('reports/specific_{name}', [ReportsController::class, 'specific']);
    Route::get('reports/inventory_{name}', [ReportsController::class, 'inventory']);

 

    Route::get('reports/export', [ReportsController::class, 'export']);


    //receiving Sector Start
    Route::get('/receiving', [ReceivingController::class, 'index']);
    Route::post('receiving/supplier', [ReceivingController::class, 'receivingSupplier'])->name('receiving.supplier');
    Route::post('receiving/store', [ReceivingController::class, 'store'])->name('receiving.store');
    Route::get('receiving/manage', [ReceivingController::class, 'manage']);
    Route::get('receiving/new-suppliers', [ReceivingController::class, 'newSuppliers']);
    Route::get('receiving/add-items', [ReceivingController::class, 'addItems']);
    Route::get('receiving/pdf/{id}', [ReceivingController::class, 'download'])->name('receiving.invoice');
    Route::get('receiving/delete/{id}', [ReceivingController::class, 'destroy'])->name('receiving.destroy');

    //Sales Sector Start
    Route::get('/sales', [SalesController::class, 'index']);
    Route::get('sales/newitem', [SalesController::class, 'newItem']);
    Route::get('sales/new_customer', [SalesController::class, 'newCustomer']);
    Route::get('sales/manage', [SalesController::class, 'manage']);
    Route::get('sales/suspended', [SalesController::class, 'suspended']);
    Route::get('sales/delete/{id}', [SalesController::class, 'destroy'])->name('sales.destroy');

    Route::post('sales/items', [SalesController::class, 'sales_items'])->name('salesItems');
    Route::post('sales/employee', [SalesController::class, 'sales_employee'])->name('sales_employee');
    Route::post('sales/store', [SalesController::class, 'sales_store'])->name('sales_store');
    Route::get('sales/test', [SalesController::class, 'test'])->name('test');

    Route::post('/add', [SalesController::class, 'add']);

    //Employees Sector Start
    Route::get('/employees', [EmployeesController::class, 'index']);
    Route::get('employees/new', [EmployeesController::class, 'newEmployees']);
    Route::post('employees/store', [EmployeesController::class, 'store']);
    Route::get('employees/sms/send', [EmployeesController::class, 'smssend']);
    Route::get('employees/{id}/edit', [EmployeesController::class, 'edit']);
    Route::post('employees/update/', [EmployeesController::class, 'update']);

    // employee login
    Route::get('/shop/login', [ShopLoginController::class, 'index']);
    Route::post('/shop/login', [ShopLoginController::class, 'login']);
    Route::get('/shop/dashboard', [ShopDashboardController::class, 'index']);

    //Gift Card Sector Start
    Route::get('/giftcards', [GiftcardController::class, 'index']);
    Route::get('giftcards/new', [GiftcardController::class, 'newgiftcards']);
    Route::post('giftcards/store', [GiftcardController::class, 'store']);
    Route::post('giftcards/search', [GiftcardController::class, 'customer_search'])->name('customer.search');
    Route::get('giftcards/{id}/edit', [GiftcardController::class, 'edit']);
    Route::post('giftcards/update', [GiftcardController::class, 'update']);
    Route::get('giftcards/{id}/delete', [GiftcardController::class, 'delete']);

    Route::get('/messages', [MessagesController::class, 'index']);

    Route::get('/storeconfig', [StoreconfigController::class, 'index'])->name('storeconfig');
    Route::post('crstoreconf', [StoreconfigController::class, 'store'])->name('storedone.storeconf');
    // Route::get('delcompanylogo/1',[StoreconfigController::class, 'delete_logo']);
    //User Management

    Route::get('/users', [UserMangementController::class, 'index'])->name('users');
    Route::get('/users/permission', [UserMangementController::class, 'permission'])->name('change.permission');
    Route::match(['get', 'post'], '/users/add', [UserMangementController::class, 'addUser'])->name('add.user');

    //Web Order
    Route::get('/weborder', [WebOrderController::class, 'index'])->name('web.order');
    Route::post('update/staus', [WebOrderController::class, 'update'])->name('update.status');

    //Coupon Control
    Route::get('/coupons', [WebOrderController::class, 'coupons'])->name('coupons');
    Route::get('/coupons/add', [WebOrderController::class, 'addCoupon'])->name('add.coupon');
    Route::post('/coupons/store', [WebOrderController::class, 'store'])->name('store.coupon');
    Route::get('coupons/edit/{id}', [WebOrderController::class, 'editCoupon'])->name('edit.coupon');
    Route::post('coupons/update', [WebOrderController::class, 'updateCoupon'])->name('update.coupon');
    Route::get('coupons/delete/{id}', [WebOrderController::class, 'deleteCoupon'])->name('delete.coupon');
    //PDF Download
    Route::get('download/pdf/{id}', [PdfController::class, 'index'])->name('download.invoice');
});


//Route::get('/shop/login',[ShopLoginController::class,'index']);//login form
Route::middleware(['shop:operator'])->group(function () {
    //receiving Sector Start
    Route::get('/shopdashboard', [ShopDashboardController::class, 'index']);
    Route::get('/shopreceiving', [ReceivingController::class, 'index']);
    Route::get('shopreceiving/new-suppliers', [ReceivingController::class, 'newSuppliers']);
    Route::get('shopreceiving/add-items', [ReceivingController::class, 'addItems']);

    //Sales Sector Start
    Route::get('/shopsales', [SalesController::class, 'index']);
    Route::get('shopsales/newitem', [SalesController::class, 'newItem']);
    Route::get('shopsales/new_customer', [SalesController::class, 'newCustomer']);
    Route::get('shopsales/manage', [SalesController::class, 'manage']);
    Route::get('shopsales/suspended', [SalesController::class, 'suspended']);
});



require __DIR__ . '/auth.php';
