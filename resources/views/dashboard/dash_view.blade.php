@extends('home')

@section('page')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 ">
            @include('partials.flash_message')
        </div>




      <!--Section: Minimal statistics cards-->
      <section>
        <div class="row">
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="fas fa-truck text-info fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3>{{$orders}}</h3>
                    <p class="mb-0">Total Orders</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="far fa-list-alt text-warning fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3>{{$categories}}</h3>
                    <p class="mb-0">Categories</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="fas fa-cube text-success fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3>{{$products}}</h3>
                    <p class="mb-0">Products</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="fas fa-users  text-success fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3>{{$users}}</h3>
                    <p class="mb-0">Clients</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->


    </div>


</div>

@endsection
