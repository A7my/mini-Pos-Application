@extends('layouts.backend.master')

@section('title')
Products
@endsection


@section('content')
<table class="table table-striped">
<thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Notes</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>

    </tr>
</thead>
@forelse($products as $product)
<tbody>
    <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->nots}}</td>
        <td><a href="{{route('products.edit' , $product->id)}}"><button type="button" class="btn btn-outline-warning">Update</button></a></td>
        <td>
        <form action="{{route('products.destroy' , $product->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </td>

        @empty
        <td></td>
        <td></td>
        <td></td>
        <td>There's No Data</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</tbody>
@endforelse
</table>

<a href="{{url('products/create')}}"><button type="button" class="btn btn-outline-success">Add New Product</button></a>

@if(Session::has('pAdd'))

<div class="alert alert-success" role="alert">
{{Session::get('pAdd')}}
</div>
@endif

@if(Session::has('PdM'))
<div class="alert alert-danger" role="alert">
{{Session::get('PdM')}}
</div>
@endif

@if(Session::has('pUp'))
<div class="alert alert-info" role="alert">
{{Session::get('pUp')}}
</div>
@endif

@endsection
