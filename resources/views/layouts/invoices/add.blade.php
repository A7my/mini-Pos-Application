@extends('layouts.backend.master')

@section('title')
Add Invoices
@endsection

@section('content')
<!-- <select name="" id="">
    @foreach($invoices as $in)
    <option value="category">{{$in->category->name}}</option>
    @endforeach
</select> -->
<form action="{{route('invoices.store')}}" method="POST">
@csrf
<label for="exampleFormControlInput1">Invoice Number</label>
<input type="text" name="iN" value="{{$iN}}" readonly class="form-control" id="exampleFormControlInput1">


<br>

<label for="exampleFormControlInput1">Category</label>
<select name="category_id" class="form-control">
    @foreach($category as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
</select>
@error('category_id')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror




<label for="exampleFormControlInput1">Product</label>
<select name="product_id" class="form-control" >

</select>
@error('product_id')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror


<label for="exampleFormControlInput1">Price</label>
<input type="text" name="price"  readonly class="form-control" id="exampleFormControlInput1">



<label for="exampleFormControlInput1">Discount</label>
<select class="form-control" name="discount">
    <option> 2.00 </option>
    <option> 5.00 </option>
    <option> 8.00 </option>
    <option> 10.00 </option>
    <option> 15.00 </option>
    <option> 20.00 </option>
</select>

<label for="exampleFormControlInput1">Tax rate</label>
<select class="form-control" name="tax_rate">
<option> 2.00 </option>
    <option> 5.00 </option>
    <option> 8.00 </option>
    <option> 10.00 </option>
    <option> 15.00 </option>
    <option> 20.00 </option>
</select>



<label for="exampleFormControlInput1">Tax value</label>
<select class="form-control" name="tax_value">
    <option> 2.00 </option>
    <option> 5.00 </option>
    <option> 8.00 </option>
    <option> 10.00 </option>
    <option> 15.00 </option>
    <option> 20.00 </option>
</select>


<label for="exampleFormControlInput1">status</label>
<select class="form-control" name="status">
    <option value="1"> Not Paid </option>
    <option value="2"> Paid </option>
</select>

<label for="exampleFormControlTextarea1">Notes</label>
<textarea class="form-control" name="note" placeholder="Notes" id="exampleFormControlTextarea1" rows="3"></textarea>
<div class="container">
  <br><br><br>
  <div class='col-sm-6'>
      <div class="form-group">
        <label for="">Date and Time</label>
          <div class='input-group date' id='datetime' name="date" >
              <input type='text' class="form-control" name="date" />
              <span class="input-group-addon" name="date">
                  <span class="glyphicon glyphicon-calendar" name="date"></span>
              </span>
          </div>
      </div>
  </div>
</div>
@error('date')
    <div class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
@enderror

<button type="submit" class="btn btn-info">Add New Invoice</button>

</form>
@if(Session::has('addI'))
<div class="alert alert-success" role="alert">
{{Session::get('addI')}}
</div>
@endif
@endsection


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script>
$(function () {
  $('#datetime').datetimepicker();
});
</script>

<script>
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url:"{{ URL::to('/product') }}/" + category_id
                    , type:"GET"
                    ,dataType:"json"
                    ,success :function(data){
                        $('select[name="product_id"]').empty();
                        $('input[name="price"]').val('');
                        $('select[name="product_id"]').append('<option selected disabled>-- Choose --</option>');
                        $.each(data,function(key,value){
                            $('select[name="product_id"]').append('<option value="' + value + '">'+ key +'</option>');
                        });
                    }
                ,});
            }else{
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('select[name="product_id"]').on('change',function(){
            var product_id = $(this).val();
            if(product_id) {
                $.ajax({
                    url:"{{ URL::to('/price') }}/" + product_id
                    , type:"GET"
                    ,dataType:"json"
                    ,success :function(data){
                        $('input[name="price"]').val(data);
                    }
                });
            }else{
                console.log('AJAX load did not work');
            }
        });
    });
</script>

@endsection
