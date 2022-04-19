
@extends('layouts.app')

@section('content')

<section >



      <!--Main layout-->
      <main  class="p-4 m-4">
        <div  class=" mt-4 container">
            <div style="margin-bottom:25vh" class="row">
                <div   class=" col-md-3 ">
                    <aside>
                        <div class="card ">
                            <div class="card-body">
                                <h4 class="card-title">Store</h4>
                                <div id="accordion-1" class="accordion" role="tablist">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" role="tab"><button class="accordion-button" data-mdb-toggle="collapse" data-mdb-target="#accordion-1 .item-1" aria-expanded="true" aria-controls="accordion-1 .item-1">Categories</button></h2>
                                        <div class="accordion-collapse collapse show item-1" role="tabpanel" data-mdb-parent="#accordion-1">
                                            <div class="accordion-body">
                                                <ul class="list-group">
                                                    @if (!empty($categories))

                                                    @foreach ($categories as $item)

                                                    <li class="list-group-item"><a href="{{route('cate.pro',["clientID"=>$item->store_id, "CateId"=>$item->id])}}">{{$item->name }}</a></li>

                                                    @endforeach

                                                    @endif


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                     @if (!empty($products))
                         @foreach ($products as $product)
                         <div class="col col-md-3 m-1">

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
                                    <h5 class="card-title mb-3"></h5>
                                  </a>
                                  <h6 class="text-center"> {{$product->name}}</h6>
                                  <a href="" class="text-reset">
                                    <p class="text-center"> <span class="badge bg-success">{{ $product->category->name}}</span></p>


                                  </a>
                                  <h6 class="mb-3 text-center"> <strong>{{ $product->price }}</strong> $</h6>
                                  <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->store_id }}"  name="storeid">
                                    <input type="hidden" value="1" name="quantity">



                                    <a  href="{{route('single.prod',['clientID'=>$product->store_id, 'slug'=>$product->slug ])}}" class="btn btn-secondary flex-fill w-100 ">view <i class=" fa fa-eye"></i></a>
                                  <button type="submit" class="btn btn-danger flex-fill w-100 mt-1 ">Add To Cart <i class=" fa fa-shopping-cart"></i></button>

                                  </form>
                                </div>
                            </div>



                        </div>
                         @endforeach


                        @endif








                    </div>
                </div>

                <nav class="float-right" aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2 <span class="visually-hidden">(current)</span></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
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







