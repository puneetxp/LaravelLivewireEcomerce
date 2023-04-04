<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  PublicController,
  CartController,
  OrderController,
  AddressController,
  PaymentController,
  OrderAddressController,
  PageController,
  EnviromentController
};

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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');
Route::get('page/{page:slug}', [PageController::class, 'view'])->name('pageview');
//Route::get('pincode/{pincode}', [PincodeController::class, 'multi']);
//Route::post('pincode/ok', [PincodeController::class, 'ok'])->name('pincode.ok');
Route::group(['middleware' => 'auth'], function () {
  Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::post('ordercancel/{order}', [OrderController::class, 'cancel'])->name('ordercancel');
    Route::get('myorders', App\Http\Livewire\User\Myorders::class)->name('myorders');
    Route::get('myaddress', App\Http\Livewire\User\Myadd::class)->name('myaddress');
    Route::get('myfav', App\Http\Livewire\User\Myfav::class)->name('myfav');
    Route::resource('address', AddressController::class);
    Route::resource('cart', CartController::class);
    Route::resource('order', OrderController::class);
    Route::resource('orderaddress', OrderAddressController::class);
    Route::resource('payment', PaymentController::class);
  });
  Route::get('user/fav', function () {
    return view('user.fav');
  })->name('fav');
});
Route::group(['middleware' => 'store', 'as' => 'store.'], function () {
  Route::get('store/dashboard', fn() =>
          view('store.dashboard'))->name('dashboard');
  Route::get('store/orders', function () {
    return view('store.orders');
  })->name('orders');
  Route::get('store/mystore', function () {
    return view('store.stores');
  })->name('mystore');
  Route::get('store/{store}/order', App\Http\Livewire\Store\Orderstore::class)->name('allorders');
  Route::get('store/{store}/product', App\Http\Livewire\Store\Productstore::class)->name('product');
  Route::get('store/{store}/delivery', App\Http\Livewire\Store\Deliveryboystore::class)->name('deliveryboy');
});
Route::group(['middleware' => 'admin', 'as' => 'admin.'], function () {
  Route::resource('enviroment', EnviromentController::class);
  Route::get('admin/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
  Route::get('admin/orders', fn() => view('admin.orders'))->name('orders');
  Route::get('admin/coupon', fn() => view('admin.coupons'))->name('coupon');
  Route::get('admin/deliveryboy', fn() => view('admin.deliveryboy'))->name('deliveryboy');
  Route::get('admin/payments', function () {
    return view('admin.payments');
  })->name('payments');
  Route::get('admin/products', function () {
    return view('admin.products');
  })->name('products');
  Route::get('admin/stores', function () {
    return view('admin.stores');
  })->name('stores');
  Route::get('admin/category', function () {
    return view('admin.categories');
  })->name('categories');
  Route::get('admin/users', function () {
    return view('admin.users');
  })->name('users');
  Route::get('admin/offers', fn() => view('admin.offers'))->name('offers');
  Route::get('admin/catchofday', fn() => view('admin.catchofday'))->name('catchofday');
  Route::get('admin/pageadmin', function () {
    return view('admin.pages');
  })->name('pageamdin');
});

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::group(['as' => 'public.'], function () {
  Route::get('/menu', [PublicController::class, 'menu'])->name('menu');
  Route::get('/category/{category:name}', [PublicController::class, 'category'])->name('category');
  Route::get('search', [PublicController::class, 'search'])->name('search');
  Route::get('/reservation', fn() => view('public.reservation'))->name('reservation');
  Route::get('/{product:name}', [PublicController::class, 'show']);
  Route::get('/{aboutus}', [PublicController::class, 'aboutus']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
  Route::resource('page', PageController::class);
});
