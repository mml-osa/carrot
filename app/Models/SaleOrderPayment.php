<?php

namespace App\Models;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class SaleOrderPayment extends Model
{
  use HasApiTokens, HasFactory, UuidGenerator;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'sale_order_id',
    'amount_paid',
    'change',
    'payment_mode',
    'payment_notes',
    'created_by',
    'updated_by',
  ];
}
