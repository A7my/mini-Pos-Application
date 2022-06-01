<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('layouts.products.index' , compact('products'));
    }

    public function create()
    {
        $category = category::all();
        return view('layouts.products.create' , compact('category'));
    }

    public function store(Request $request , product $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'notes' => 'required|min:20',
        ]);

        $product = new product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->nots = $request->notes;
        $product->save();
        return redirect()->to('products')->with('pAdd' , 'you added new product');
    }

    public function show(product $product)
    {

    }

    public function edit(product $product)
    {
        $product = product::find($product->id);
        $category = category::all();
        // echo $product;
        return view('layouts.products.update' , compact('product' , 'category'));
    }

    public function update(Request $request, product $product)
    {

        $validated = $request->validate([
            'name' => 'required|unique:products',
            'note' => 'required|min:20',
            'price' => 'required|',
        ]);

        $product = product::findorfail($product->id);
        $product->name = $request->name;
        $product->nots = $request->note;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->save();
        echo $request->category_id;
        return redirect()->to('products')->with('pUp' , 'you updated your category');
    }


    public function destroy(product $product)
    {
        $product = product::findorfail($product->id);
        $product->delete();
        return redirect()->to('products')->with('PdM' , 'you deleted a product');
    }
}
