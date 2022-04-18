@extends('home')

@section('page')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 ">
            @include('partials.flash_message')
        </div>

        <div class="row">

            <div class="col-md-6 text-center">
                @if (!empty($store))
                <div class="card-4 p-4 m-4  bg-white">
                 <h6><strong>Your Store Name: </strong>{{$store->name}}</h6>
                 <h6><strong>Address:</strong>{{$store->Address}}</h6>
                 <hr>
                  <h5>Description</h5>
                 <p class=" justified">{{$store->description}}</p>
                 <hr>
                 <h6><strong>Your Store Status: </strong> Active</h6>
                </div>

                @else

                <div class="card-4 p-4 m-4  ">

                        <form enctype="" method="POST" action="{{route('mystore.store')}} " >
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Store Name</label>
                                <input type="text" class="form-control " name="name">
                              </div>

                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Address</label>
                                  <input type="text" name="Address" class="form-control ">

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Description</label>
                                  <input type="text" name="description" class="form-control ">

                              </div>

                              <button class="btn btn-secondary w-100" type="submit">update</button>
                            </form>


                   </div>

          @endif

            </div>
            <div class="col-md-6">
                @if (!empty($store))
                <div class="card-4 p-4 m-4  ">


                        <form  method="POST" action="{{route('mystore.update', $store->id)}} " >
                            @csrf
                            @method("PUT")

                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Store Name</label>
                              <input type="text" class="form-control "value="{{$store->name}}" name="name">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <input type="text" name="Address" value="{{$store->Address}}"  class="form-control ">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text" name="description" value="{{$store->description}}"class="form-control ">

                            </div>

                            <button class="btn btn-secondary w-100" type="submit">update</button>
                          </form>

                   </div>
                   @endif


            </div>
        </div>

    </div>


</div>

@endsection
