<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\OrderChannel;

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

    OrderChannel::create(['name'=>'Online','alias'=>'online','description'=>'Order was made online']);
    OrderChannel::create(['name'=>'Walk In','alias'=>'walk_in','description'=>'Order was a walk-in']);
    OrderChannel::create(['name'=>'Phone call','alias'=>'phone_call','description'=>'Order was made via phone call']);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('order_channels');
  }
};
