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
    Schema::dropIfExists('restaurants');
    Schema::create('restaurants', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name',225)->nullable(false);
      $table->string('email_address',255)->nullable(false);
      $table->string('phone_number',25)->nullable(false);
      $table->text('location_address',255)->nullable(false);
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
    Schema::dropIfExists('restaurants');
  }
};
