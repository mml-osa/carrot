<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::dropIfExists('users');
    Schema::create('users', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('username', 65)->unique()->nullable(false);
      $table->string('first_name',65)->nullable(false);
      $table->string('last_name',255)->nullable(false);
      $table->string('phone_number',25)->nullable(false);
      $table->text('location_address')->nullable(false);
      $table->string('email', 255)->unique()->nullable(false);
      $table->timestamp('email_verified_at')->nullable(true);
      $table->string('password')->nullable(false);
      $table->uuid('role_id')->nullable(false);
      $table->foreign('role_id')->references('id')->on('roles')->cascadeOnDelete()->cascadeOnUpdate();
      $table->boolean('is_active')->default(true);
      $table->uuid('created_by')->nullable(true);
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
