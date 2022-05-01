@extends('layouts.app')

@section('content')





<section  style="margin-top:40px; margin-bottom:40px" style="margin-bottom: 25vh" class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">


          <div class="card mb-5">
            <div class="card-body p-4">


                <div class="text-center">
                  <h1> Thanks for choosing us :)</h1>
                   @if (!empty($orderid))

                   <h1> Your Order Id is: <span class="badge badge-primary"> {{$orderid}}</span> </h1>



                   @endif

                </div>


            </div>
          </div>




        </div>
      </div>
    </div>
  </section>


@endsection
@section('footer')
<footer style="margin-top:15vh"  class="text-center text-white fixed-bottom" style="background-color: #000000;">
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
