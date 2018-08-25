<?php

namespace UnivControl;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
  protected $fillable = [
      'name', 'founded'
  ];

  public function users(){
      return $this->hasMany(User::class);
  }
}
