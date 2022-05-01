@extends('layouts.app')

@section('content')



<section  style="margin-top:40px; margin-bottom:40px" style="margin-bottom: 25vh" class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
            @if ($message = Session::get('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> <p class="text-green-800">{{ $message }}</p>
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
              </div>
        @endif
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
            <div>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Remove All Cart</button>
                  </form>

            </div>
          </div>
          @foreach ($cartItems as $item)
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2">{{$item->name}}</p>
                  <p><span class="text-muted"> <span class="badge bg-primary ">New</span> </p>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">


                    <form class="inline-form"action="{{ route('cart.update') }}" method="POST">
                        @csrf
                    <input type="hidden" name="id" value="{{ $item->id}}" >

                     <input type="number"class="form-control form-control-sm" name="quantity" value="{{ $item->quantity }}"

                      class="w-6 text-center bg-gray-300" />

                      <button type="submit" class="btn btn-success mt-2"><i class="fa fa-refresh"></i></button>

                      </form>








                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">{{$item->price}}$</h5>
                </div>

                <div class="col-md-1 col-lg-1 col-xl-1 text-end">



                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">

                  <button type="submit"  class=" btn btn-danger"><i class="fas fa-trash fa-lg"></i></button>
                    </form>

                </div>
              </div>
            </div>
          </div>


          @endforeach

          <div class="card mb-5">
            <div class="card-body p-4">

              <div class="float-end">
                <p class="mb-0 me-5 d-flex align-items-center">
                  <span class="small text-muted me-2">Total:</span> <span class="lead fw-normal">{{ Cart::getTotal() }}$</span>
                </p>
              </div>
              <div class="">
                <p class="mb-0 me-5 d-flex align-items-center">
                   <a href="/checkout" class="btn btn-success">Go To Checkout</a>
                </p>
              </div>

            </div>
          </div>

          </div>


        </div>
      </div>
    </div>
  </section>


  @section('footer')
  <footer class="text-center text-white fixed-bottom" style="background-color: #000000;">
    <!-- Grid container -->
    <div class="container p-4"></div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgb(0, 0, 0);">
      © 2022 Copyright
      <a class="text-white" href="#"> Ethio CRM-STORE</a>
    </div>
    <!-- Copyright -->
  </footer>



@endsection
