<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MenuItemCategory;

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
      $table->string('alias', 255)->nullable(false);
      $table->text('description')->nullable(true);
      $table->boolean('is_active')->default(true);
      $table->timestampsTz();
    });

    MenuItemCategory::create(['name'=>'Alcoholic Drinks','alias'=>'alcoholic_drinks']);
    MenuItemCategory::create(['name'=>'Non-Alcoholic Drinks','alias'=>'non_alcoholic_drinks']);
    MenuItemCategory::create(['name'=>'Local Dishes','alias'=>'local_dishes']);
    MenuItemCategory::create(['name'=>'Continental Dishes','alias'=>'continental_dishes']);
    MenuItemCategory::create(['name'=>'Sides','alias'=>'sides']);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('menu_item_categories');
  }
};
