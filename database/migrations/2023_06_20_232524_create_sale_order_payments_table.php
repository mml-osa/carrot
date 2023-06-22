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
    Schema::dropIfExists('sale_order_payments');
    Schema::create('sale_order_payments', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('sale_order_id')->nullable(false);
      $table->double('amount_paid')->nullable(false);
      $table->double('change')->nullable(false);
      $table->string('payment_mode')->nullable(false);
      $table->text('payment_notes')->nullable(true);
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
    Schema::dropIfExists('sale_order_payments');
  }
};
