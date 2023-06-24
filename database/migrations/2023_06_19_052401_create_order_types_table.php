<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\OrderType;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::dropIfExists('order_types');
    Schema::create('order_types', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name', 35)->nullable(false);
      $table->string('alias', 35)->nullable(true);
      $table->text('description')->nullable(true);
      $table->boolean('is_active')->default(true);
      $table->timestampsTz();
    });

    OrderType::create(['name'=>'Delivery','alias'=>'online','description'=>'Request to deliver order']);
    OrderType::create(['name'=>'Pickup','alias'=>'delivery','description'=>'Request to pick up order']);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('order_types');
  }
};
