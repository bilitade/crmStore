@extends('layouts.app')

@section('content')


{{-- <section>

    <div style="margin-top: 25vh" class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">

                <h3 class="text-3xl text-bold">Cart List</h3>
              <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                  <thead>
                    <tr class="h-12 uppercase">
                      <th class="hidden md:table-cell"></th>
                      <th class="text-left">Name</th>
                      <th class="pl-5 text-left lg:text-right lg:pl-0">
                        <span class="lg:hidden" title="Quantity">Qtd</span>
                        <span class="hidden lg:inline">Quantity</span>
                      </th>
                      <th class="hidden text-right md:table-cell"> price</th>
                      <th class="hidden text-right md:table-cell"> Remove </th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($cartItems as $item)
                    <tr>
                      <td class="hidden pb-4 md:table-cell">
                        <a href="#">
                          <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                        </a>
                      </td>
                      <td>
                        <a href="#">
                          <p class="mb-2 md:ml-4">{{ $item->name }}</p>

                        </a>
                      </td>
                      <td class="justify-center mt-6 md:justify-end md:flex">
                        <div class="h-10 w-28">
                          <div class="relative flex flex-row w-full h-8">

                            <form action="{{ route('cart.update') }}" method="POST">
                              @csrf
                              <input type="hidden" name="id" value="{{ $item->id}}" >
                            <input type="number" name="quantity" value="{{ $item->quantity }}"
                            class="w-6 text-center bg-gray-300" />
                            <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
                            </form>
                          </div>
                        </div>
                      </td>
                      <td class="hidden text-right md:table-cell">
                        <span class="text-sm font-medium lg:text-base">
                            ${{ $item->price }}
                        </span>
                      </td>
                      <td class="hidden text-right md:table-cell">
                        <form action="{{ route('cart.remove') }}" method="POST">
                          @csrf
                          <input type="hidden" value="{{ $item->id }}" name="id">
                          <button class="px-4 py-2 text-white bg-red-600">x</button>
                      </form>

                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
                <div>
                 Total: ${{ Cart::getTotal() }}
                </div>
                <div>

                </div>


              </div>
            </div>
          </div>
    </div>

</section> --}}


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
