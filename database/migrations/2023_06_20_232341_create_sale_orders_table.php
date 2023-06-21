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
    Schema::dropIfExists('sale_orders');
    Schema::create('sale_orders', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->integer('order_code')->autoIncrement();
      $table->uuid('user_id')->nullable(false);
      $table->double('order_amount')->nullable(false);
      $table->string('order_type')->nullable(false);
      $table->string('order_channel')->nullable(false);
      $table->string('order_status')->nullable(false);
      $table->text('order_notes')->nullable(true);
      $table->uuid('created_by')->nullable(false);
      $table->uuid('updated_by')->nullable(true);
      $table->timestampsTz();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sale_orders');
  }
};
