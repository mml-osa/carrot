<?php

namespace App\Models;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class RestaurantModel extends Model
{
  use HasApiTokens, HasFactory, UuidGenerator;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email_address',
    'phone_number',
    'location_address',
    'created_by',
    'updated_by',
  ];
}
