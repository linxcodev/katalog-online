@extends('master')

@section('title', 'Welcome')

@section('content')
  <div class="container">
    <h1>List Produk</h1>

    <div class="row">
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="img/s.jpeg" alt="Card image cap">
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">Sepatu Nike</h5>
              <p class="card-text">Rp. 450.000</p>
              <div class="kcl">Supplier: <a href="#" class="">Bagus</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="img/s.jpeg" alt="Card image cap">
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">Polo Ga</h5>
              <p class="card-text">Rp. 190.000</p>
              <div class="kcl">Supplier: <a href="#" class="">Thjan</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="img/s.jpeg" alt="Card image cap">
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">Topi Br56</h5>
              <p class="card-text">Rp. 80.000</p>
              <div class="kcl">Supplier: <a href="#" class="">Galuh</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="img/s.jpeg" alt="Card image cap">
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">Jaket keren</h5>
              <p class="card-text">Rp. 300.000</p>
              <div class="kcl">Supplier: <a href="#" class="">Bagus</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="img/s.jpeg" alt="Card image cap">
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">Jaket Parasut</h5>
              <p class="card-text">Rp. 330.000</p>
              <div class="kcl">Supplier: <a href="#" class="">Bagus</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="img/s.jpeg" alt="Card image cap">
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">Tshirt 67</h5>
              <p class="card-text">Rp. 160.000</p>
              <div class="kcl">Supplier: <a href="#" class="">Thjan</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
@endsection
