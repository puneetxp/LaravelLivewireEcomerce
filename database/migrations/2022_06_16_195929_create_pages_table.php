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
    Schema::create('pages', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('slug');
      $table->string('title');
      $table->longText('body');
      $table->integer('category')->default(0);
      $table->string('seotitle')->nullable();
      $table->string('keywords')->nullable();
      $table->string('keydescription')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('pages');
  }
};
