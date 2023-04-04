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
    Schema::create('order_addresses', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('name');
      $table->string('line');
      $table->string('district');
      $table->string('state');
      $table->string('log');
      $table->string('lang');
      $table->string('pincode');
      $table->string('phone');
      $table->string('email');
      $table->string('alternate')->nullable();
      $table->foreignId('order_id')->constrained();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('order_addresses');
  }
};
