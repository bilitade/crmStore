@extends('layouts.app')

@section('content')


<section  style="margin-top:40px; margin-bottom:40px" style="margin-bottom: 25vh" class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <h1  class="text-center"> Checkout</h1>
        <hr>

          <div class="row">

             <div class="col-12 col-md-6">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">
                        @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole!</strong> <p class="text-green-800">{{ $message }}</p>
                            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                          </div>
                    @endif
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <hr>
                        <h3 class="fw-normal mb-0 text-black">Order Summary</h3>

                        <div>


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



                            <span>   <strong>{{$item->price}}$</strong>    *   {{$item->quantity}}</span>







                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">


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

                        </div>
                      </div>

                      </div>


                    </div>
                  </div>


                  <div class="col-12 col-md-6">
                      <h6 class="text-center">Biling Detail</h6>
                    <div class="card">
                   <div class="card-body ">
                       <form  method="POST" action="{{route('order.store')}} " >
                           @csrf
                           <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Your Name</label>
                             <input type="text" class="form-control " name="name" id="exampleInputEmail1"  required>

                           </div>
                           <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Address</label>
                               <input type="text" name="Address" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>

                           </div>
                           <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Email</label>
                            <input type="email" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>

                        </div>
                           <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Phone</label>
                            <input type="phone" name="phone" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>

                        </div>






                           <button class="btn btn-primary w-100" type="submit">Make A Purchase</button>
                         </form>
                     </div>




                    </div> </div>


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



@endsection
