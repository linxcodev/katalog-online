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
        <tr>
          <td>Bagus</td>
          <td>bagus@domain.com</td>
          <td>Semarang</td>
          <td>30 tahun</td>
          <td><a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Hapus</a> </td>
        </tr>
        <tr>
          <td>Bagus</td>
          <td>bagus@domain.com</td>
          <td>Semarang</td>
          <td>30 tahun</td>
          <td>
            <a href="#" class="btn btn-primary">Edit</a>
            <a href="#" class="btn btn-danger hps">Hapus</a>
          </td>
        </tr>
        <tr>
          <td>Bagus</td>
          <td>bagus@domain.com</td>
          <td>Semarang</td>
          <td>30 tahun</td>
          <td><a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Hapus</a> </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
