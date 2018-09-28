<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
  public function index()
  {
    $supplier = Supplier::all();

    return view('supplier', ['suppliers' => $supplier]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required', 'email' => 'required|email|unique:suppliers',
      'kota' => 'required', 'tahun' => 'required'
    ]);

    Supplier::create($request->all());

    return redirect()->route('supplier.index');
  }

  public function update(Request $request)
  {
    $request->validate([
      'nama' => 'required', 'email' => 'required|email|unique:suppliers',
      'kota' => 'required', 'tahun' => 'required'
    ]);

    Supplier::find($request->edtid)->update($request->except(['_method', 'edtid']));

    return redirect()->route('supplier.index');
  }
}
