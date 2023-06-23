<?php

namespace App\Models;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class SaleOrderItem extends Model
{
  use HasApiTokens, HasFactory, UuidGenerator;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'menu_item_id',
    'sale_order_id',
    'menu_item_price',
    'quantity',
    'menu_item_total_price',
    'created_by',
    'updated_by',
  ];

}
