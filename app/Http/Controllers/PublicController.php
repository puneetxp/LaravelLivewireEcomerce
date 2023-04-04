<?php

namespace App\Http\Controllers;

use App\Models\{
  Category,
  Product,
  Offer,
  Catchofday
};
use Illuminate\Http\Request;

class PublicController extends Controller {

  public function index() {
    return view('public.index', [
        'categories' => Category::all(),
        'offers' => Offer::all(),
        'catchofday' => Catchofday::first()]);
  }

  public function search() {
    return view('public.search', ['products' => Product::latest()->filter(request(['search', 'category']))->paginate(24)->withQueryString()]);
  }

  public function show(Product $product) {
    return view('public.show', ['product' => $product]);
    //
  }

  public function menu() {
    return view('public.menu', [
        'categories' => Category::all()]);
  }

  public function category(Category $category) {
    $x = Product::with('photos.photo', 'productprice')->filter(['category' => $category->name])->paginate(24)->withQueryString();
    return view('public.search', ['products' => $x]);
  }

  public function aboutus() {
    return view('public.about');
  }

  //
}
