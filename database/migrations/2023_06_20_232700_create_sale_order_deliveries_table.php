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
    Schema::dropIfExists('sale_order_deliveries');
    Schema::create('sale_order_deliveries', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('sale_order_id')->nullable(false);
      $table->string('delivery_status')->nullable(false);
      $table->string('delivery_by')->nullable(false);
      $table->text('delivery_notes')->nullable(true);
      $table->timestampsTz();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sale_order_deliveries');
  }
};
