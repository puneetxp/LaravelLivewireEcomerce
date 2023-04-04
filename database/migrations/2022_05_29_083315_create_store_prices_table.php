<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('store_prices', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->foreignId('store_id')->constrained();
      $table->foreignId('product_id')->constrained();
      $table->float('price', 8, 2);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('store_prices');
  }
};
