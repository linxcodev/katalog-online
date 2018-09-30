<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
  public function index()
  {
    $produk = Produk::all();
    $supplier = Supplier::all();

    return view('produk', ['produks' => $produk, 'suppliers' => $supplier]);
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
    $upload = $request->gambar->storeAs('public/img', $filename);

    Produk::create([
      'nama' => $request->nama, 'supplier_id' => $request->supplier_id,
      'harga' => $request->harga, 'status' => $request->status,
      'gambar' => $filename
    ]);

    return redirect()->route('produk.index');
  }

  public function update(Request $request)
  {
    $produk = Produk::find($request->edtid);

    $request->validate([
      'nama' => 'required',
      'supplier' => 'required',
      'harga' => 'required',
      'gambar' => 'image|mimes:jpeg,png,jpg|max:1024',
    ]);

    if(Input::hasFile('gambar'))
    {
      $produkImage = public_path("storage/img/{$produk->gambar}"); // get previous image from folder
      // dd($produkImage);
      if (File::exists($produkImage)) { // unlink or remove previous image from folder
        unlink($produkImage);
      }

      $ext =  $request->gambar->getClientOriginalExtension();
      $filename = time().'.'.$ext;
      $upload = $request->gambar->storeAs('public/img', $filename);
    }

    ($request->status == "on") ? $request->status = 'Aktif' :
      $request->status = 'Tidak Aktif';

    $produk->update([
      'nama' => $request->nama, 'supplier_id' => $request->supplier,
      'harga' => $request->harga, 'status' => $request->status,
      'gambar' => $filename
    ]);

    return redirect()->route('produk.index');
  }

  public function destroy(Request $request)
  {
    Produk::destroy($request->hpsid);

    return redirect()->route('produk.index');
  }
}
