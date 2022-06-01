@extends('layouts.backend.master')

@section('title')
Create Product
@endsection
@section('content')
<form action="{{route('products.store')}}" method="POST">
@csrf
<div class="card card-default">
          <div class="card-header">

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>


          <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Product Name">
        </div>
        @error('name')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror

        <div class="form-group">
                        <label>Product Notes</label>
                        <textarea  name="notes" class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>
        @error('note')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" style="width: 100%;" name="category_id">

                @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach

                  </select>
                </div>

              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->


                <div class="col-3">
                <h3 class="card-title">Price</h3>

                    <input type="text"  name="price" class="form-control" placeholder="Price">
                  </div>
            <!-- /.row -->
        </div>
        @error('price')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror
        <button type="submit" class="btn btn-info">Add</button>

        </div>

</form>
@endsection
