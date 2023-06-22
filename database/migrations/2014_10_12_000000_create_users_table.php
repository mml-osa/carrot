<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\UserRoleModel;
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
      $table->string('username',65)->unique()->nullable(false);
      $table->string('email',255)->unique()->nullable(false);
      $table->timestamp('email_verified_at')->nullable(true);
      $table->string('password')->nullable(false);
      $table->string('user_role_id')->nullable(false);
      $table->boolean('is_active')->default(true);
      $table->uuid('updated_by')->nullable(true);
      $table->rememberToken();
      $table->timestampsTz();
    });

    $super_admin = UserRoleModel::where('alias','super_admin')->first();
    $admin = UserRoleModel::where('alias','admin')->first();
    $user = UserRoleModel::where('alias','user')->first();

    User::create(['username'=>'superadmin','email'=>'superadmin@carrotproject.io','email_verified_at'=>now(),'password'=>Hash::make('superadmin'),'user_role_id'=>$super_admin->id]);
    User::create(['username'=>'admin','email'=>'dmin@carrotproject.io','email_verified_at'=>now(),'password'=>Hash::make('admin'),'user_role_id'=>$admin->id]);
    User::create(['username'=>'user','email'=>'user@carrotproject.io','email_verified_at'=>now(),'password'=>Hash::make('user'),'user_role_id'=>$user->id]);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
