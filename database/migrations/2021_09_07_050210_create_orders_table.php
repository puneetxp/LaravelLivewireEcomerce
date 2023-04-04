<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->foreignId('user_id')->constrained();
      $table->float('price', 8, 2)->nullable();
      $table->float('shipping', 8, 2)->nullable();
      $table->integer('status')->default(0);
      $table->foreignId('coupon_id')->nullable()->constrained();
      $table->longText('note')->nullable();
      $table->integer('code')->nullable();
      $table->boolean('ok')->default(0);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('orders');
  }

}
