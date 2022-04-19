@extends('home')

@section('page')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 ">
            @include('partials.flash_message')

        </div>

        @if ( !empty($product))
    <div class="card p-4 w-75">
      <div class="card-body ">
        <form enctype="multipart/form-data" method="POST" action="{{route('products.update',$product->id)}} " >
            @method("PUT")
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Product Name</label>
              <input type="text" class="form-control " name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->name}}" required>

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Description</label>
                <input type="text" name="description" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->description}}" >

            </div>
            <div class="mb-3">
                <label class="form-label" for="customFile">Image</label>
                <input
                type="file"
                name="image"
                id="inputImage"
                class="form-control @error('image') is-invalid @enderror">

            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            @if (!empty($categories))


             <div class="mb-3">
                <label class="form-label" for="customFile">Categroy</label>
                <select  name="category" class="form-select " required>
                    @foreach ($categories as $category)
                    <option   value="{{$category->id}}"> {{$category->name}} - {{$category->id}}</option>
                    @endforeach


                  </select>
             </div>
             @endif
            <div class="mb-3">
              <label for="" class="form-label">Price</label>
              <div class="input-group "><span class="input-group-text"> <i class="fa fa-dollar"></i> </span> <input type="number"step="0.01" value="{{$product->price}}"  name="price" class="form-control " type="text"  required/>
            </div>
            </div>



            <button class="btn btn-primary w-100" type="submit">Update</button>
          </form>
     </div>

        </div>

<!-- Name input -->

        @endif
</div>

@endsection
