@extends('home')

@section('page')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 ">
            @include('partials.flash_message')

        </div>

        @if ( !empty($category))
    <div class="card p-4 w-75">
      <div class="card-body ">
        <form enctype="multipart/form-data" method="POST" action="{{route('category.update',$category->id)}} " >
            @method("PUT")
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Product Name</label>
              <input type="text" class="form-control " name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->name}}" required>

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Description</label>
                <input type="text" name="description" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->description}}" >

            </div>






            <button class="btn btn-primary w-100" type="submit">update</button>
          </form>
     </div>

        </div>

<!-- Name input -->

        @endif
</div>

@endsection
