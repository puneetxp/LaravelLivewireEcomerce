<?php

namespace App\Http\Controllers;

use App\Models\{
  Cart,
  Product,
  StorePrice
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $x = cart::with('product.category', 'product.photos.photo')->where('user_id', Auth::id())->get();
    return view('user.cart', [
        'cartitems' => $x
    ]);
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    if (request()->store_id) {
      $y['store_id'] = request()->store_id;
    } else {
      $t = StorePrice::where('product_id', request()->product_id)->first();
      $y['store_id'] = $t->store_id;
    }
    $y['product_id'] = request()->product_id;
    $y['user_id'] = Auth::user()->id;
    $x = StorePrice::where('product_id', $y['product_id'])->where('store_id', $y['store_id'])->first()->price;
    $y['price'] = $x;
    $z = Cart::where($y)->first();
    $y['qty'] = 1;
    //$y['price'] = $request->price;
    if ($z) {
      $y['qty'] = $z->qty + request()->qty;
    } else {
      $y['qty'] = request()->qty;
    }
    $d = Cart::upsert([$y], ['user_id', 'product_id', 'store_id'], ['qty', 'price']);
    return (Auth::user()->carts);
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    //
    $y['product_id'] = request()->product_id;
    $y['user_id'] = Auth::user()->id;
    $y['store_id'] = $request->store_id;
    $y['price'] = StorePrice::where('product_id', request()->product_id)->where('store_id', request()->store_id)->first()->price;
    $z = Cart::where($y)->first();
    //$y['price'] = $request->price;
    if ($z) {
      $y['qty'] = $z->qty + request()->qty;
    } else {
      $y['qty'] = request()->qty;
    }
    $d = Cart::upsert($y, ['user_id', 'product_id', 'store_id'], ['qty', 'price']);
    $x = cart::with('product.category', 'product.photos.photo')->where('user_id', Auth::id())->get();
    return view('user.cart', [
        'cartitems' => $x
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Cart  $cart
   * @return \Illuminate\Http\Response
   */
  public function show(Cart $cart) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Cart  $cart
   * @return \Illuminate\Http\Response
   */
  public function edit(Cart $cart) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Cart  $cart
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Cart $cart) {
    //
    if ($cart->qty) {
      $y = request()->qty;
    } else {
      $y = 1;
    }
    $cart->update(['qty' => $y]);
    $x = cart::with('product.category', 'product.photos.photo')->where('user_id', Auth::id())->get();
    return $x;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Cart  $cart
   * @return \Illuminate\Http\Response
   */
  public function destroy(Cart $cart) {
    $cart->delete();
    $x = cart::with('product.category', 'product.photos.photo')->where('user_id', Auth::id())->get();
    return $x;
    //
  }

}
