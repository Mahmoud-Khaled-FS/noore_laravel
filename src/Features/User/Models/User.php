<?php

namespace Src\Features\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasFactory, Notifiable, HasApiTokens;

  /**
   * @var list<string>
   */
  protected $guarded = [];

  /**
   * @var list<string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  public function addresses()
  {
    return $this->hasMany(Address::class);
  }
}
