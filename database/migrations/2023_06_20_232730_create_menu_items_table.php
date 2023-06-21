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
    Schema::dropIfExists('menu_items');
    Schema::create('menu_items', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('menu_item_category_id')->nullable(false);
      $table->string('name', 255)->nullable(false);
      $table->text('description')->nullable(true);
      $table->double('menu_item_price')->nullable(false);
      $table->string('menu_item_size')->nullable(false);
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
    Schema::dropIfExists('menu_items');
  }
};
