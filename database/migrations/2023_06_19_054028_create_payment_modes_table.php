<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PaymentMode;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::dropIfExists('payment_modes');
    Schema::create('payment_modes', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name', 35)->nullable(false);
      $table->string('alias', 35)->nullable(true);
      $table->text('description')->nullable(true);
      $table->boolean('is_active')->default(true);
      $table->uuid('created_by')->nullable(true);
      $table->uuid('updated_by')->nullable(true);
      $table->timestampsTz();
    });

    PaymentMode::create(['name'=>'Cash','alias'=>'phone_call','description'=>'Order was paid with cash']);
    PaymentMode::create(['name'=>'Mobile Money','alias'=>'online','description'=>'Order was paid with mobile money']);
    PaymentMode::create(['name'=>'Visa Card','alias'=>'phone_call','description'=>'Order was paid with visa card']);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('payment_modes');
  }
};
