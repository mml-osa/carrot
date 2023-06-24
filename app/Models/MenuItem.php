<?php

namespace App\Models;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class MenuItem extends Model
{
  use HasApiTokens, HasFactory, UuidGenerator;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'menu_id',
    'name',
    'menu_item_price',
    'menu_item_size_id',
    'is_active',
    'created_by',
    'updated_by',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'alias',
  ];

  public function menu()
  {
    return $this->belongsTo(Menu::class,'menu_id','id');
  }
}
