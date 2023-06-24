<?php

namespace App\Models;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Status extends Model
{
  use HasApiTokens, HasFactory, UuidGenerator;

  /**
   * The table name.
   *
   * @var array<string, string>
   */
  protected $table = 'statuses';

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
    'description',
  ];

  public function saleOrder()
  {
    return $this->belongsTo(Status::class);
  }
}
