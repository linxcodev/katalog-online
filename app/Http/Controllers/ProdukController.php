<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
  public function index()
  {
    $supplier = Supplier::all();

    return view('produk', ['suppliers' => $supplier]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required', 'supplier_id' => 'required',
      'harga' => 'required', 'gambar' => 'required|image|mimes:jpeg,png,jpg|max:1024',
    ]);

    ($request->status == "on") ? $request->status = 'Aktif' :
      $request->status = 'Tidak Aktif';

    $ext =  $request->gambar->getClientOriginalExtension();
    $filename = time().'.'.$ext;
    $upload = $request->gambar->storeAs('img', $filename);

    Produk::create([
      'nama' => $request->nama, 'supplier_id' => $request->supplier_id,
      'harga' => $request->harga, 'status' => $request->status,
      'gambar' => $filename
    ]);

    return redirect()->route('produk.index');
  }
}
