<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::dropIfExists('roles');
    Schema::create('roles', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name', 35)->nullable(false);
      $table->string('alias', 35)->nullable(true);
      $table->text('description')->nullable(true);
      $table->boolean('is_active')->default(true);
      $table->timestampsTz();
    });

    Role::create(['name'=>'Super Admin','alias'=>'super_admin','description'=>'Full System administrative rights']);
    Role::create(['name'=>'Admin','alias'=>'admin','description'=>'System administrative rights']);
    Role::create(['name'=>'User','alias'=>'user','description'=>'Limited system administrative rights']);
    Role::create(['name'=>'Customer','alias'=>'customer','description'=>'System administrative rights']);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('roles');
  }
};
