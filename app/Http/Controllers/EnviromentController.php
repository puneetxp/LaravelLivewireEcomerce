<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnviromentController extends Controller {

  public function index() {
    return view('admin.enviroment');
  }

  public function store(Request $request) {
    //
    foreach ($request->all() as $key => $value) {
      $_ENV[$key] = $value;
    }
    $x = '';
    unset($_ENV['_token']);
    foreach ($_ENV as $key => $value) {
      $x .= $key . "=" . $value . "\n";
    }
    base_path('.env');
    file_put_contents(base_path('.env'), $x);
    return redirect()->back();
  }

  //
}
