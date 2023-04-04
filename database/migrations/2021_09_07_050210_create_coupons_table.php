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
    Schema::create('coupons', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('name');
      $table->integer('status')->default(0);
      $table->integer('minimum')->nullable();
      $table->foreignId('user_id')->nullable()->constrained();
      $table->foreignId('product_id')->nullable()->constrained();
      $table->foreignId('category_id')->nullable()->constrained();
      $table->string('value')->nullable();
      $table->string('percentage')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('coupons');
  }
};
