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
    Schema::dropIfExists('order_channels');
    Schema::create('order_channels', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name', 35)->nullable(false);
      $table->string('alias', 35)->nullable(true);
      $table->text('description')->nullable(true);
      $table->boolean('is_active')->default(true);
      $table->uuid('created_by')->nullable(true);
      $table->uuid('updated_by')->nullable(true);
      $table->timestampsTz();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('order_channels');
  }
};
