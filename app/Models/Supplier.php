<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $guarded = [];

  public function produks()
  {
    return $this->hasMany('App\Models\Produk');
  }
}
