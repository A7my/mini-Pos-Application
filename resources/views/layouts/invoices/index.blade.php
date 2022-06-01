@extends('layouts.backend.master')

@section('title')
Invoices
@endsection


@section('content')
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Invoice Number</th>
        <th scope="col">Invoice Date</th>
        <th scope="col">Category</th>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Dicount</th>
        <th scope="col">Tax Rate</th>
        <th scope="col">Tax Value</th>
        <th scope="col">Total</th>
        <th scope="col">Status</th>
        <th scope="col">Notes</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>
    </tr>
    </thead>

    <tbody>

@forelse($invoices as $in)
    <tr>
        <th scope="col">{{$in->id}}</th>
        <th scope="col">{{$in->invoice_number}}</th>
        <th scope="col">{{$in->invoice_date}}</th>
        <th scope="col">{{$in->category->name}}</th>
        <th scope="col">{{$in->product->name}}</th>
        <th scope="col">{{$in->price}}</th>
        <th scope="col">{{$in->discount}}</th>
        <th scope="col">{{$in->tax_rate}}</th>
        <th scope="col">{{$in->tax_value}}</th>
        <th scope="col">{{$in->tatal}}</th>
        <th scope="col">
                <!--
                1 = Paid
                2 = Not Paid
                -->
            @if($in->status == 1)
            <p class="text-danger">Not Paid</p>
            @else
            <p class="text-success">Paid</p>
            @endif
        </th>
        <th scope="col">{{$in->notes}}</th>
        <th>
            <form action="" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </th>
        <th><a href=""><button type="button" class="btn btn-info">Update</button></a></th>
    </tr>

@empty
<tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">No Invoices</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>

@endforelse
    </tbody>
</table>

@endsection
