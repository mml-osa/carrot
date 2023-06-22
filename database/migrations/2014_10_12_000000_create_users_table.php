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
    Schema::dropIfExists('users');
    Schema::create('users', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('username',65)->unique()->nullable(false);
      $table->string('email',255)->unique()->nullable(false);
      $table->timestamp('email_verified_at')->nullable(true);
      $table->string('password')->nullable(false);
      $table->string('user_role')->nullable(false);
      $table->boolean('is_active')->default(true);
      $table->uuid('updated_by')->nullable(true);
      $table->rememberToken();
      $table->timestampsTz();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
