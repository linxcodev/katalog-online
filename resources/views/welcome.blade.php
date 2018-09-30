@extends('master')

@section('title', 'Welcome')

@section('content')
<div class="container">
  <h1>List Produk</h1>
  <div class="row">
    @foreach ($produks as $produk)
      <div class="col-md-4 mb-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{ asset('storage/img/'.$produk->gambar) }}"
          alt="Card image cap" width="250px" height="250px" onerror="this.src='{{asset('img/noimage.png')}}'">
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">{{ $produk->nama }}</h5>
              <p class="card-text">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
              <div class="kcl">Supplier: <a href="#" class="">{{ $produk->supplier->nama }}</a></div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      {{$produks->links()}}
    </ul>
  </nav>
</div>
@endsection
