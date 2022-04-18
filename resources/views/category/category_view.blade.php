@extends('home')

@section('page')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 ">
            @include('partials.flash_message')


        </div>
<!-- Delete Warning Modal -->
<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('category.destroy', 'id') }}" method="post">
                @csrf
                @method('DELETE')
                <input id="id" name="id" hidden>
                <h5 class="text-center">Are you sure you want to delete this Product?</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger">Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>
        <!-- End Delete Modal -->

        <div class="row">
            <div class="col-md-3">
                <div class="card p-4 w-75">
                    <div class="card-body ">
                      <form enctype="multipart/form-data" method="POST" action="{{route('category.store')}} " >
                          @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                            <input type="text" class="form-control " name="name" id="exampleInputEmail1" aria-describedby="emailHelp" required>

                          </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label"> Category Description</label>
                              <input type="text" name="description" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>

                          </div>






                          <button class="btn btn-primary w-100" type="submit">create</button>
                        </form>
                    </div>
            </div>



        </div>


        <div class="col-md-9">
            @if ( !empty($categories))


            <div class="col-xl-12 col-xxl-12">
                <div class="card shadow">
                    <div
                        class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th> Category Name</th>
                                        <th>Category Description</th>
                                        <th>Category Slug</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)


                                    <tr>
                                        <td class="text-truncate" style="max-width: 200px;">{{$category->name}}</td>
                                        <td class="text-truncate" style="max-width: 200px;">{{$category->description}}</td>
                                        <td class="text-truncate" style="max-width: 200px;">{{$category->slug}}</td>


                                        <td>
                                            <span>
                                               {{-- !-- Delete Warning Modal -->  --}}

                                                <a href="#"
                                                    data-id={{$category->id}}
                                                    class="btn btn-danger delete"
                                                    data-mdb-toggle="modal"
                                                    data-mdb-target="#deleteModal"> <i class="fa fa-trash"> </i></a>
                                                    <a href="{{ route("category.edit", $category->id)}}" class=" btn btn-warning"> <i class="fa fa-edit"></i></a>
                                            </span>



                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {!! $categories->links() !!}
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

<!-- Name input -->


</div>

@endsection
