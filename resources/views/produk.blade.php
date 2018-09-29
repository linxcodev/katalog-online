@extends('master')

@section('title', 'Produk')

@section('content')
  <div class="container">
    <h1>Data Produk</h1>

    <button type="button" class="btn btn-success btn-lg float-right"
    data-toggle="modal" data-target="#tambah">
      Tambah
    </button>
    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
          </div>
          <div class="mg">
            <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control">
                <label>Supplier:</label>
                <select class="form-control" name="supplier_id">
                  @foreach ($suppliers as $supplier)
                  <option value="{{ $supplier->id }}">
                    {{ $supplier->nama }}
                  </option>
                  @endforeach
                </select>
                <label>Harga Jual:</label>
                <input type="number" name="harga" class="form-control">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" name="status" type="checkbox" id="customCheck1">
                  <label class="custom-control-label" id="ccl" for="customCheck1">
                    Aktif
                  </label>
                </div>
                <label for="exampleFormControlFile1">Gambar:</label>
                <input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Supplier</th>
          <th scope="col">Harga Jual</th>
          <th scope="col">Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produks as $produk)
          <tr>
            <td>{{ $produk->nama }}</td>
            <td>{{ $produk->supplier->nama }}</td>
            <td>Rp. {{ number_format($produk->harga, 0, ",", ".") }}</td>
            <td>{{ $produk->status }}</td>
            <td>
              <a href="#" class="btn btn-info" data-toggle="modal"
              data-nama="{{'$supplier->nama'}}" data-email="{{'$supplier->email'}}"
              data-id={{'$supplier->id'}} data-kota="{{'$supplier->kota'}}"
              data-tahun="{{'$supplier->tahun'}}" data-target="#edit">Edit</a>
              <a href="#" data-toggle="modal" data-target="#delete"
              data-id={{'$supplier->id'}} class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
            </div>
            <div class="mg">
              <form id="edtform" action="{{ route('supplier.update') }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-body">
                  <label>Nama:</label>
                  <input type="text" name="nama" class="form-control">
                  <label>Supplier:</label>
                  <select class="form-control" name="supplier">
                    <option value="Bagus">Bagus</option>
                    <option value="Agus">Agus</option>
                    <option value="Bogem">Bogem</option>
                    <option value="Sopo">Sopo</option>
                  </select>
                  <label>Harga Jual:</label>
                  <input type="number" name="harga" class="form-control">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="status" type="checkbox" id="customCheck1">
                    <label class="custom-control-label" id="ccl" for="customCheck1">
                      Aktif
                    </label>
                  </div>
                  <label for="exampleFormControlFile1">Gambar:</label>
                  <input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1">
                </div>
                <div class="modal-footer">
                  <div class="col-md-6">
                    <img src="" alt="noimg" width="200px" height="200px">
                  </div>
                  <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary mgtp" data-dismiss="modal">Batal</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
    <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header rmb">
            <h4 class="modal-title" id="myModalLabel">Apakah anda yakin?</h4>
          </div>
          <form action="{{route('supplier.destroy')}}" method="post">
          		@method('delete')
          		@csrf
    	      <div class="modal-body">
  	      		<input type="hidden" name="hpsid" id="delid">
    	      </div>
    	      <div class="modal-footer">
    	        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
    	        <button type="submit" class="btn btn-danger">Hapus</button>
    	      </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
