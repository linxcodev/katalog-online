<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
  protected $guarded = [];

  public function supplier()
  {
    return $this->belongsTo('App\Models\Supplier');
  }
}
