<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::dropIfExists('sale_order_items');
    Schema::create('sale_order_items', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('menu_item_id')->nullable(false);
      $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
      $table->uuid('sale_order_id')->nullable(false);
      $table->foreign('sale_order_id')->references('id')->on('sale_orders')->onDelete('cascade');
      $table->double('menu_item_price')->nullable(false);
      $table->integer('quantity')->default(0)->nullable(false);
      $table->double('menu_item_total_price')->default(0)->nullable(false);
      $table->timestampsTz();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sale_order_items');
  }
};
