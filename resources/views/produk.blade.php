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
              <a href="#" class="btn btn-info" data-toggle="modal" data-id="{{$produk->id}}"
              data-nama="{{$produk->nama}}" data-supplier="{{$produk->supplier->id}}"
              data-harga="{{$produk->harga}}" data-status="{{$produk->status}}"
              data-gambar="{{asset('storage/img/'.$produk->gambar)}}" data-target="#edit">Edit</a>
              <a href="#" data-toggle="modal" data-target="#delete"
              data-id={{$produk->id}} class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
            </div>
            <div class="mg">
              <form id="edtform" action="{{ route('produk.update') }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                  <input type="hidden" name="edtid" id="edtid">
                  <label>Nama:</label>
                  <input type="text" name="nama" class="form-control" id="nama">
                  <label>Supplier:</label>
                  <select class="form-control" name="supplier" id="supplier">
                    @foreach ($suppliers as $supplier)
                      <option value="{{$supplier->id}}">
                        {{ $supplier->nama }}
                      </option>
                    @endforeach
                  </select>
                  <label>Harga Jual:</label>
                  <input type="number" name="harga" class="form-control" id="harga">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="status" type="checkbox" id="ckedt">
                    <label class="custom-control-label" id="ccl" for="ckedt">
                      Aktif
                    </label>
                  </div>
                  <label for="exampleFormControlFile1">Gambar:</label>
                  <input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1">
                </div>
                <div class="modal-footer">
                  <div class="col-md-6">
                    <img src="" onerror="this.src='{{asset('img/noimage.png')}}'"
                    alt="noimg" width="100px" height="100px" id="gambar">
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
          <form action="{{route('produk.destroy')}}" method="post">
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

@section('script')
  $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var nama = button.data('nama')
    var supplier = button.data('supplier')
    var harga = button.data('harga')
    var status = button.data('status')
    var gambar = button.data('gambar')

    var modal = $(this)
    modal.find('.modal-body #edtid').val(id);
    modal.find('.modal-body #nama').val(nama);
    modal.find('.modal-body #supplier').val(supplier);
    modal.find('.modal-body #harga').val(harga);
    if (status == "Aktif") {
      $('#ckedt').prop('checked', true);
    } else {
      $('#ckedt').prop('checked', false);
    }
    modal.find('.modal-footer #gambar').attr("src", gambar);
  })

  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body #delid').val(id);
  })
@endsection
