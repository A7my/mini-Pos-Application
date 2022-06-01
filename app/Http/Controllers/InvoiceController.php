<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = invoice::all();
        return view('layouts.invoices.index' , compact('invoices'));
    }

    public function create()
    {
        $iN = invoice::latest()->first()->invoice_number;
        $iN = $iN + 1;
        $invoices = invoice::all();
        $category = category::all();
        $products = product::all();
        return view('layouts.invoices.add' , compact('invoices' , 'category' , 'iN' , 'products'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'date' => 'required',
            'category_id' => 'required',
            'product_id' => 'required',
        ]);

// Handle The Date
        $re1 = explode(' ' , $request->date);
        $date = explode('/' , $re1[0]);
        $d = $date[1];
        $m = $date[0];
        $y = $date[2];
        $D = "$y/$m/$d";
// Handle The Total
        $total = $request->price - $request->discount;
        $total = $total + $request->tax_value;

        $new = new invoice;
        $new->invoice_number = $request->iN;
        $new->invoice_date = $D;
        $new->category_id = $request->category_id;
        $new->product_id = $request->product_id;
        $new->price =  $request->price;
        $new->discount =  $request->discount;
        $new->tax_rate =  $request->tax_rate;
        $new->tax_value =  $request->tax_value;
        $new->total =  $total;
        $new->status =  $request->status;
        $new->notes =  $request->note;
        $new->save();
        // echo $request->iN . '<br>';
        // echo $request->category_id . '<br>';
        // echo $request->product_id. '<br>';
        // echo $request->price . '<br>';
        // echo $request->discount . '<br>';
        // echo $request->tax_rate . '<br>';
        // echo $request->total . '<br>';
        // echo $request->note . '<br>';
        // echo $request->date . '<br>';

        return redirect()->to('invoices/create')->with('addI' , 'you added new invoice');




    }

    public function show(invoice $invoice)
    {
        //
    }

    public function edit(invoice $invoice)
    {
        //
    }

    public function update(Request $request, invoice $invoice)
    {
        //
    }

    public function destroy(invoice $invoice)
    {
        //
    }
    public function getProduct($id)
    {

        $products = product::where('category_id' , $id)->pluck('id' , 'name');
        return $products;
    }

    public function getPrice($id)
    {

        $price = product::where('id' , $id)->first()->price;
        return $price;
    }
}
