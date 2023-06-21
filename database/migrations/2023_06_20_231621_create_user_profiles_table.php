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
      $table->string('first_name',65)->nullable(false);
      $table->string('last_name',255)->nullable(false);
      $table->string('phone_number',25)->nullable(false);
      $table->text('location_address')->nullable(false);
      $table->uuid('updated_by')->nullable(true);
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
