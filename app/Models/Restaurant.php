<?php

namespace App\Models;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Restaurant extends Model
{
  use HasApiTokens, HasFactory, UuidGenerator;

  /**
   * The table name.
   *
   * @var array<string, string>
   */
  protected $table = 'restaurants';

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
    'name',
    'alias',
    'email',
    'phone_number',
    'location',
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
    return $this->hasMany(Menu::class,'restaurant_id','id');
  }
}
