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
      $table->integer('order_code');
      $table->uuid('user_id')->nullable(false);
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->double('order_amount')->nullable(false);
      $table->uuid('order_type_id')->nullable(false);
      $table->foreign('order_type_id')->references('id')->on('order_types')->onDelete('cascade');
      $table->uuid('order_channel_id')->nullable(false);
      $table->foreign('order_channel_id')->references('id')->on('order_channels')->onDelete('cascade');
      $table->uuid('order_status_id')->nullable(false);
      $table->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('cascade');
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
