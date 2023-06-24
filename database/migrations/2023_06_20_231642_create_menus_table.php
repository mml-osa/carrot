<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::dropIfExists('menus');
    Schema::create('menus', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('restaurant_id')->nullable(true);
      $table->foreign('restaurant_id')->references('id')->on('restaurants')->cascadeOnDelete()->cascadeOnUpdate();
      $table->string('name', 255)->nullable(false);
      $table->string('alias', 255)->nullable(false);
      $table->text('description')->nullable(true);
      $table->boolean('is_active')->default(true);
      $table->uuid('created_by')->nullable(true);
      $table->uuid('updated_by')->nullable(true);
      $table->timestampsTz();
    });

    Menu::create(['name'=>'Alcoholic Drinks','alias'=>'alcoholic_drinks']);
    Menu::create(['name'=>'Non-Alcoholic Drinks','alias'=>'non_alcoholic_drinks']);
    Menu::create(['name'=>'Local Dishes','alias'=>'local_dishes']);
    Menu::create(['name'=>'Continental Dishes','alias'=>'continental_dishes']);
    Menu::create(['name'=>'Sides','alias'=>'sides']);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('menus');
  }
};
