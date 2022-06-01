@extends('layouts.backend.master')

@section('title')
Add New Item
@endsection

@section('content')
<form action="{{route('categories.store')}}" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">Category Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
    @error('name')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Category Notes</label>
    <textarea class="form-control" name="note" placeholder="Notes" id="exampleFormControlTextarea1" rows="3"></textarea>
    @error('note')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
    @enderror
</div>
<input class="btn btn-primary" type="submit" value="Add">
</form>
@endsection
