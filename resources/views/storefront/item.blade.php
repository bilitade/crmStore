
@extends('layouts.app')

@section('content')

<section >



      <!--Main layout-->
      <main  class="p-4 m-4">
        <div  class=" mt-4 container">
            <div style="margin-bottom:25vh" class="row">
                <div class="card-50">
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
                        <h5 class="card-title mb-3"></h5>
                      </a>
                      <a href="" class="text-reset">

                      </a>
                       @if (!empty($product))

                       <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <input type="hidden" value="{{ $product->id }}" name="id">
                         <input type="hidden" value="{{ $product->name }}" name="name">
                         <input type="hidden" value="{{ $product->price }}" name="price">
                         <input type="hidden" value="{{ $product->image }}"  name="image">
                         <input type="hidden" value="{{ $product->store_id }}"  name="store_id">
                         <input type="hidden" value="" name="quantity">


                         <h6 class="mb-3">{{ $product->price }}$</h6>
                         <h6> {{$product->description}}</h6>

                       <button type="submit" class="btn btn-danger flex-fill ms-1">Add To Cart <i class=" fa fa-shopping-cart"></i></button>

                       </form>

                       @endif

                    </div>
                </div>

            </div>




 <!--Grid row-->
</section>


@endsection
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







