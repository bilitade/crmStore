
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

         @if (!empty($stores))

 <!--Grid row-->
 <div class="row wow fadeIn">
    @foreach ($stores as $store)
<!--Grid column-->
<div class="col-lg-3 col-md-6 mb-4">

    <div class="card">
        <div
          class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
          data-mdb-ripple-color="light"
        >
        <i class="fas fa-store p-4" style="font-size: 5rem"></i>
          <a href="#!">
            <div class="mask">
              <div class="d-flex justify-content-start align-items-end h-100">
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

            <h5 class="card-title mb-3">{{$store->name}}</h5>
          </a>
         <a href="{{route('st.prod', ['clientID'=>$store->id])}}" class="btn btn-success"> Explorer</a>


        </div>
    </div>
    <!--Card-->

  </div>
  <!--Grid column-->
    @endforeach



  </div>
         @else







          </section>
          <!--Section: Products v.3-->


          <div class="pt-4">
            {!! $stores->links() !!}

        </div>


        @endif
        </div>
      </main>
      <!--Main layout-->


</section>





@endsection

@section('footer')
<footer  style="margin-top:15vh"class="text-center text-white fixed-bottom" style="background-color: #000000;">
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







