@extends('home')

@section('content')



<section  style="margin-top:40px; margin-bottom:40px" style="margin-bottom: 25vh" class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="col-md-7 ">
            @include('partials.flash_message')
        </div>
        <hr>

          <div class="row">

             <div class="col-12 col-md-12">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">


                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <hr>
                        <h3 class="fw-normal mb-0 text-black">Order Detail</h3>

                        <div>


                        </div>
                      </div>
                      @if (!empty($orderItems))


                      @foreach ($orderItems as $item)
                      <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                          <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                              <p class="lead fw-normal mb-2">{{$item->product->name}}</p>

                            </div>

                            <div class="col-md-3 ">
                            <span>    {{$item->quantity}}</span>

                            </div>
                            <div class="col-md-3 ">
                                item price:{{$item->product->price}}$

                            </div>



                          </div>
                        </div>
                      </div>


                      @endforeach
                      @endif

                      <div class="card mb-5">
                        <div class="card-body p-4">
                            <div class="float-start">
                                <p class="">
                                   <h6> <strong>Customer Name:</strong> {{$order->customer}} </h1>
                                    <h6> <strong>Status:</strong>{{$order->status}} </h1>


                                </p>
                              </div>
                          <div class="float-end">
                            <p class="">
                               <h6>  <strong>Total Price:</strong> {{$order->totalPrice}}</h1>
                                <h6> <strong>Order Date:</strong> {{$order->created_at->diffForHumans();}}</h6>


                            </p>
                          </div>
                        </div>
                             <form action="{{route('orders.update', $order->id)}}" method="post">
                                @csrf
                            <button class="btn btn-success w-100 {{ ($order->status=="completed")?"disabled":" "}}">completed</button>
                             </form>


                      </div>

                      </div>


                    </div>
                  </div>


              </div>







  </section>


@endsection
