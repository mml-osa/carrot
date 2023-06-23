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
      $table->string('email', 255)->unique()->nullable(false);
      $table->timestamp('email_verified_at')->nullable(true);
      $table->string('password')->nullable(false);
      $table->uuid('role_id')->nullable(false);
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
      $table->boolean('is_active')->default(true);
      $table->uuid('updated_by')->nullable(true);
      $table->rememberToken();
      $table->timestampsTz();
    });

    $super_admin = Role::where('alias', 'super_admin')->first();
    $admin = Role::where('alias', 'admin')->first();
    $user = Role::where('alias', 'user')->first();

    User::create(['username' => 'SuperAdmin', 'email' => 'superadmin@carrotproject.io', 'email_verified_at' => now(), 'password' => Hash::make('superadmin'), 'role_id' => $super_admin->id]);
    User::create(['username' => 'Admin', 'email' => 'dmin@carrotproject.io', 'email_verified_at' => now(), 'password' => Hash::make('admin'), 'role_id' => $admin->id]);
    User::create(['username' => 'User', 'email' => 'user@carrotproject.io', 'email_verified_at' => now(), 'password' => Hash::make('user'), 'role_id' => $user->id]);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
