<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MenuItemSize;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::dropIfExists('menu_item_sizes');
    Schema::create('menu_item_sizes', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name', 35)->nullable(false);
      $table->string('alias', 35)->nullable(true);
      $table->text('description')->nullable(true);
      $table->boolean('is_active')->default(true);
      $table->timestampsTz();
    });

    MenuItemSize::create(['name'=>'Small Pack','alias'=>'small_pack','description'=>'Small sized serving']);
    MenuItemSize::create(['name'=>'Medium Pack','alias'=>'medium_pack','description'=>'Medium sized serving']);
    MenuItemSize::create(['name'=>'Large Pack','alias'=>'large_pack','description'=>'Large sized serving']);
    MenuItemSize::create(['name'=>'Jumbo','alias'=>'jumbo','description'=>'Jumbo sized serving']);
    MenuItemSize::create(['name'=>'Family Size','alias'=>'family_size','description'=>'Family sized serving']);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('menu_item_sizes');
  }
};
