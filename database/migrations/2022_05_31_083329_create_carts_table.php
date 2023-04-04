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
    Schema::create('carts', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->foreignId('user_id')->constrained();
      $table->foreignId('product_id')->constrained();
      $table->foreignId('store_id')->constrained();
      $table->integer('qty');
      $table->float('price', 8, 2);
      $table->unique(['product_id', 'user_id']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('carts');
  }
};
