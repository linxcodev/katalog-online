<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $produk = Produk::paginate(6);

    return view('welcome', ['produks' => $produk]);
  }
}
