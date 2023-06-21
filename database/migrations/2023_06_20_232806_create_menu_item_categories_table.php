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
    Schema::dropIfExists('menu_item_categories');
    Schema::create('menu_item_categories', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name', 255)->nullable(false);
      $table->text('description')->nullable(true);
      $table->boolean('is_active')->default(true);
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
    Schema::dropIfExists('menu_item_categories');
  }
};
