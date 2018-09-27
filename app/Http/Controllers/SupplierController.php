<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
  public function index()
  {
    return view('supplier');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required', 'email' => 'required|email|unique:suppliers',
      'kota' => 'required', 'tahun' => 'required'
    ]);

    $supplier = Supplier::create($request->all());

    return view('supplier');
  }
}
