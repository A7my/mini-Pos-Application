@extends('layouts.backend.master')

@section('title')
Update
@endsection

@section('content')
<form action="{{route('categories.update' , $cat->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="exampleFormControlInput1">Category Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name" value="{{$cat->name}}">
    @error('name')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Category Notes</label>
    <textarea class="form-control" name="note" placeholder="Notes" id="exampleFormControlTextarea1" rows="3">{{$cat->notes}}</textarea>
    @error('note')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror
</div>
<input class="btn btn-primary" type="submit" value="Update">
</form>
@endsection
