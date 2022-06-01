@extends('layouts.backend.master')

@section('title')
Update Product
@endsection

@section('content')
<form action="{{route('products.update' , $product->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="form-group">
    <label for="exampleFormControlInput1">Product Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name" value="{{$product->name}}">
</div>

@error('name')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror


<div class="form-group">
    <label for="exampleFormControlTextarea1">Product Notes</label>
    <textarea class="form-control" name="note" placeholder="Notes" id="exampleFormControlTextarea1" rows="3">{{$product->nots}}</textarea>
</div>
@error('note')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror

<div class="form-group">
                <label>Category</label>
                <select class="form-control select2" style="width: 100%;" name="category_id">
                @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
                </select>
</div>

<div class="col-3">
    <h3 class="card-title">Price</h3>

    <input type="text"  value="{{$product->price}}" name="price" class="form-control" placeholder="Price">
</div>
@error('price')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror

<input class="btn btn-primary" type="submit" value="Update">
</form>



@endsection
