<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Status;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::dropIfExists('statuses');
    Schema::create('statuses', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name', 35)->nullable(false);
      $table->string('alias', 35)->nullable(true);
      $table->boolean('is_active')->default(true);
      $table->uuid('created_by')->nullable(true);
      $table->uuid('updated_by')->nullable(true);
      $table->timestampsTz();
    });

    Status::create(['name'=>'Pending','alias'=>'pending']);
    Status::create(['name'=>'In Progress','alias'=>'in_progress']);
    Status::create(['name'=>'Done','alias'=>'done']);
    Status::create(['name'=>'Cancelled','alias'=>'cancelled']);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('statuses');
  }
};
