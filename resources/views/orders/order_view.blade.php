@extends('home')

@section('page')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 ">
            @include('partials.flash_message')
        </div>







        @if ( !empty($orders))


        <div class="col-xl-12 col-xxl-12">
            <div class="card shadow">
                <div
                    class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
                     <h6> All orders</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Status</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)


                                <tr>
                                    <td class="text-truncate" style="max-width: 200px;">{{$order->id}}</td>
                                    <td class="text-truncate" style="max-width: 200px;">{{$order->customer}}</td>
                                    <td class="text-truncate" style="max-width: 200px;">{{$order->status}}</td>
                                    <td>

                                        <a href="{{route('orders.show',$order->id)}}"> <i class="fas fa-eye "></i></a>
                                 
                                    </td>

                                    <td>




                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {!! $orders->links() !!}
                    {{-- <nav>
                        <ul class="pagination pagination-sm mb-0 justify-content-center">
                            <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav> --}}
                </div>

                <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                <script>
                    $(document).on('click','.delete',function(){
                            let id = $(this).attr('data-id');
                            console.log(id);
                            $('#id').val(id);
                       });
               </script>
            </div>
        </div>

        @else

        <h1> no data</h1>

        @endif
    </div>


</div>

@endsection
