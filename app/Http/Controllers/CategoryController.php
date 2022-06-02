<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // iNDEX
    public function index()
    {
        $categories = category::all();
        return view('layouts.website.categories' , compact('categories'));
    }


    public function create()
    {
        return view('layouts.website.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
            'note' => 'required|min:20',
        ]);
        $category = new category;
        $category->name = $request->name;
        $category->notes = $request->note;
        $category->save();
        return redirect()->route('categories.index')->with('add_ms' , "You've added a new item");
    }
    public function show(category $category)
    {
        //
    }

    public function edit(category $category)
    {
        $cat = category::find($category->id);
        return view('layouts.website.update' , compact('cat'));

    }

    public function update(Request $request, category $category)
    {

        $validated = $request->validate([
            'name' => 'required|unique:categories',
            'note' => 'required|min:20',
        ]);

        $newCat = category::findorfail($category->id);
        $newCat->name  = $request->name;
        $newCat->notes = $request->note;
        $newCat->save();
        return redirect()->route('categories.index')->with('up_msg' , "you've updated your data");

    }

    public function destroy(category $category)
    {
        $cat = category::findorfail($category->id);
        $cat->delete();
        // category::destroy($category->id);
        return redirect()->route('categories.index')->with('del_msg' ,"you've deleted an item");
    }
}
