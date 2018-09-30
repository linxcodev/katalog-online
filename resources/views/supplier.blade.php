@extends('master')

@section('title', 'Supplier')

@section('content')
  <div class="container">
    <h1>Data Supplier</h1>

    <button type="button" class="btn btn-success btn-lg float-right"
    data-toggle="modal" data-target="#tambah">
      Tambah
    </button>
    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
            </div>
            <div class="mg">
              <div class="modal-body">
                <form id="tmbhform" action="{{ route('supplier.store') }}" method="post">
                  @csrf
                  <label>Nama:</label>
                  <input type="text" name="nama" class="form-control">
                  <label>Email:</label>
                  <input type="text" name="email" class="form-control">
                  <label>Kota Asal:</label>
                  <select class="form-control" name="kota">
                    <option value="">-- Pilih --</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Pemalang">Pemalang</option>
                    <option value="Depok">Depok</option>
                    <option value="Ngawi">Ngawi</option>
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Medan">Medan</option>
                  </select>
                  <label>Tahun Kelahiran:</label>
                  <select class="form-control" name="tahun">
                    <option value="">-- Pilih --</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                  </select>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" id="tmbhbtn" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">email</th>
          <th scope="col">Kota</th>
          <th scope="col">Umur</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($suppliers as $supplier)
          <tr>
            <td>{{ $supplier->nama }}</td>
            <td>{{ $supplier->email }}</td>
            <td>{{ $supplier->kota }}</td>
            <td>{{ $supplier->tahun }}</td>
            <td>
              <a href="#" class="btn btn-primary" data-toggle="modal"
              data-nama="{{$supplier->nama}}" data-email="{{$supplier->email}}"
              data-id={{$supplier->id}} data-kota="{{$supplier->kota}}"
              data-tahun="{{$supplier->tahun}}" data-target="#edit">Edit</a>
              <a href="#" data-toggle="modal" data-target="#delete"
              data-id={{$supplier->id}} class="btn btn-danger">Hapus</a>
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
              <div class="modal-body">
                <form id="edtform" action="{{ route('supplier.update') }}" method="post">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="edtid" id="edtid">
                  <label>Nama:</label>
                  <input type="text" name="nama" id="nama" class="form-control">
                  <label>Email:</label>
                  <input type="text" name="email" id="email" class="form-control">
                  <label>Kota Asal:</label>
                  <select class="form-control" name="kota" id="kota">
                    <option value="Semarang">Semarang</option>
                    <option value="Pemalang">Pemalang</option>
                    <option value="Depok">Depok</option>
                    <option value="Ngawi">Ngawi</option>
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Medan">Medan</option>
                  </select>
                  <label>Tahun Kelahiran:</label>
                  <select class="form-control" name="tahun" id="tahun">
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                  </select>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" id="edtbtn" class="btn btn-primary">Edit</button>
              </div>
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

@section('script')
  $('#tmbhbtn').on('click', function() {
    $('#tmbhform').submit();
  });

  $('#edtbtn').on('click', function() {
    $('#edtform').submit();
  });

  $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var nama = button.data('nama')
    var email = button.data('email')
    var id = button.data('id')
    var kota = button.data('kota')
    var tahun = button.data('tahun')
    var modal = $(this)
    modal.find('.modal-body #nama').val(nama);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #edtid').val(id);
    modal.find('.modal-body #kota').val(kota);
    modal.find('.modal-body #tahun').val(tahun);
  })

  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body #delid').val(id);
  })
@endsection
