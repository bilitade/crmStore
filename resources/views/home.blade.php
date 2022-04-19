{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@extends('layouts.app')

@section('sidebar')

<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="/dashboard" class="list-group-item list-group-item-action py-2 ripple {{  request()->routeIs('dashboard*') ? 'active' : '' }}" aria-current="true">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
        </a>
        <a href="{{route("products.index") }}" class="list-group-item list-group-item-action py-2 ripple  {{  request()->routeIs('products.*') ? 'active' : '' }} ">
            {{-- {{ (strpos(Route::currentRouteName(), 'products.index') == 0) ? 'active' : '' }} --}}
          <i class="fas fa-chart-area fa-fw me-3"></i><span>Product </span>
        </a>
        <a href="{{route('category.index')}}" class="list-group-item list-group-item-action py-2 ripple {{  request()->routeIs('category.*') ? 'active' : '' }} "><i
            class="fas fa-list-alt fa-fw me-3  "></i><span>Category</span></a>
        <a href="/orders" class="list-group-item list-group-item-action py-2 ripple  {{  request()->routeIs('orders*') ? 'active' : '' }} "><i
            class="fas fa fa-truck fa-fw me-3"></i><span>Orders</span></a>

            @role('admin')
            <a href="{{route('users.index')}}" class="list-group-item list-group-item-action py-2 ripple {{  request()->routeIs('users*') ? 'active' : '' }}"><i
                class="fas fa-users fa-fw me-3"></i><span>Manage User</span></a>
        @else

        @endrole



        <a href="/mystore" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-globe fa-fw me-3"></i><span>My Store</span></a>

      </div>
    </div>
  </nav>
  <!-- Sidebar -->

@endsection


@section('content')
  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">

    @yield('page')




  </main>
  <!--Main layout-->

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




