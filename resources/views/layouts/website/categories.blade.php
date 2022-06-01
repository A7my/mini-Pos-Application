@extends('layouts.backend.master')
@section('title')
Categories
@endsection

@section('content')

<table class="table table-striped">
<thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Notes</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>

    </tr>
</thead>
@forelse($categories as $cat)
<tbody>
    <tr>
        <th scope="row">{{$cat->id}}</th>
        <td>{{$cat->name}}</td>
        <td>{{$cat->notes}}</td>
        <td><a href="{{route('categories.edit' , $cat->id)}}"><button type="button" class="btn btn-outline-warning">Update</button></a></td>
        <td>
        <form action="{{route('categories.destroy' , $cat->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <!-- <input class="btn btn-danger" type="submit" value="Delete" > -->

            <button type="submit" class="btn btn-outline-danger">Delete</button>

            </form>
        </td>

        @empty
        <td></td>
        <td></td>
        <td></td>
        <td>There's No Data</td>
        <td></td>
    </tr>
</tbody>
@endforelse
</table>

<!-- <a href="{{url('categories/create')}}"><button type="button" class="btn btn-primary btn-lg" >Add New Item</button></a> -->
<a href="{{route('categories.create')}}"><button type="button" class="btn btn-outline-success">Add New Item</button></a>

@if(Session::has('add_ms'))

<div class="alert alert-success" role="alert">
{{Session::get('add_ms')}}
</div>
@endif

@if(Session::has('del_msg'))
<div class="alert alert-danger" role="alert">
{{Session::get('del_msg')}}
</div>
@endif

@if(Session::has('up_msg'))
<div class="alert alert-info" role="alert">
{{Session::get('up_msg')}}
</div>
@endif
@endsection

