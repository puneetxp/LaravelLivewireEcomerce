<?php

namespace App\Providers;

use App\Models\{
  Category,
  Page
};
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider {

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    View::share('categories', Category::all());
    View::share('pages', Page::where('category', '>', '0')->get());
    //
  }

}
