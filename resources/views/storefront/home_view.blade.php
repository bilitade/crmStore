
@extends('layouts.app')

@section('content')

<section >



      <!--Main layout-->
      <main  class="p-4 m-4">
        <div class="container">

          <!--Navbar-->
          <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

            <!-- Navbar brand -->
            <span class="navbar-brand">Categories:</span>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
              aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div  style="margin-top: 25" class="collapse navbar-collapse  bg-primary rounded p-2 m-4" id="basicExampleNav">

              <!-- Links -->
              <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                  <a class="nav-link" href="#">All
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Shirts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Sport wears</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Outwears</a>
                </li>

              </ul>
              <!-- Links -->

              <form class="form-inline">
                <div class="input-group text-white">
                    <div class="form-outline">
                      <input type="search" id="form1" class="form-control" />
                      <label class="form-label " for="form1">Search</label>
                    </div>
                    <button type="button" class="btn btn-secondary">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
              </form>
            </div>
            <!-- Collapsible content -->

          </nav>
          <!--/.Navbar-->

          <!--Section: Products v.3-->
          <section class="text-center mb-4">

         @if (!empty($products))

 <!--Grid row-->
 <div class="row wow fadeIn">
    @foreach ($products as $product)
<!--Grid column-->
<div class="col-lg-3 col-md-6 mb-4">

    <div class="card">
        <div
          class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
          data-mdb-ripple-color="light"
        >
          <img
            src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/belt.webp"
            class="w-100"
          />
          <a href="#!">
            <div class="mask">
              <div class="d-flex justify-content-start align-items-end h-100">
                <h5><span class="badge bg-primary ms-2">New</span></h5>
              </div>
            </div>
            <div class="hover-overlay">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15);"
              ></div>
            </div>
          </a>
        </div>
        <div class="card-body">
          <a href="" class="text-reset">
            <h5 class="card-title mb-3">{{$product->name}}</h5>
          </a>
          <a href="" class="text-reset">
            <p>Category</p>
          </a>
          <h6 class="mb-3">{{$product->price}}$</h6>
          <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $product->id }}" name="id">
            <input type="hidden" value="{{ $product->name }}" name="name">
            <input type="hidden" value="{{ $product->price }}" name="price">
            <input type="hidden" value="{{ $product->image }}"  name="image">
            <input type="hidden" value="1" name="quantity">




          <button type="submit" class="btn btn-danger flex-fill ms-1">Add To Cart <i class=" fa fa-shopping-cart"></i></button>

          </form>
        </div>
    </div>
    <!--Card-->

  </div>
  <!--Grid column-->
    @endforeach



  </div>
         @else


         @endif




          </section>
          <!--Section: Products v.3-->




          <!--Pagination-->
          <nav class="d-flex justify-content-center wow fadeIn">
            <ul class="pagination pg-blue">

              <!--Arrow left-->
              <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>

              <li class="page-item active">
                <a class="page-link" href="#">1
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">5</a>
              </li>

              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
          <!--Pagination-->

        </div>
      </main>
      <!--Main layout-->


</section>


@endsection







