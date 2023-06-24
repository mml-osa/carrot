<?php

namespace App\Models;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class RestaurantMenu extends Model
{
  use HasApiTokens, UuidGenerator;

  /**
   * The table name.
   *
   * @var array<string, string>
   */
  protected $table = 'restaurant_menus';

  /**
   * The primary key of the table.
   *
   * @var array<string, string>
   */
  protected $primaryKey = 'id';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'restaurant_id',
    'menu_item_category_id'
  ];

  public function restaurant()
  {
    return $this->hasMany(Restaurant::class);
  }
}
