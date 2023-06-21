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
    Schema::dropIfExists('user_profiles');
    Schema::create('user_profiles', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('user_id')->nullable(false);
      $table->string('first_name')->nullable(false);
      $table->string('last_name')->nullable(false);
      $table->string('address')->nullable(false);
      $table->integer('phone')->nullable(false);
      $table->string('location_lat')->nullable(false);
      $table->string('location_long')->nullable(false);
      $table->timestampsTz();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('user_profiles');
  }
};
