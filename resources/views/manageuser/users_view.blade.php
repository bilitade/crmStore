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
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('users.destroy', 'id') }}" method="post">
                @csrf
                @method('DELETE')
                <input id="id" name="id" hidden>
                <h5 class="text-center">Are you sure you want to delete this User?</h5>

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




        @if ( !empty($users))


        <div class="col-xl-12 col-xxl-12">
            <div class="card shadow">
                <div
                    class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
                    <a href="{{route('users.create')}}" class="btn btn-primary w-25">Add Admin</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Joined</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)


                                <tr>
                                    <td class="text-truncate" style="max-width: 200px;">{{$user->name}}</td>
                                    <td class="text-truncate" style="max-width: 200px;">{{$user->email}}</td>
                                    <td class="text-truncate" style="max-width: 200px;"> <span class="badge rounded-pill badge-success"><?php foreach($user->getRoleNames() as $role){print $role;}  ?></span></td>
                                    <td class="text-truncate" style="max-width: 200px;">{{$user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <span>
                                           {{-- !-- Delete Warning Modal -->  --}}

                                            <a href="#"
                                                data-id={{$user->id}}
                                                class="btn btn-danger delete  {{(Auth::Id()==$user->id)?'disabled':''}}"
                                                data-mdb-toggle="modal"
                                                data-mdb-target="#deleteModal"> <i class="fa fa-trash"> </i></a>
                                                <a href="{{ route("users.edit", $user->id)}}" class=" btn btn-warning"> <i class="fa fa-edit"></i></a>
                                        </span>



                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {!! $users->links() !!}
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
