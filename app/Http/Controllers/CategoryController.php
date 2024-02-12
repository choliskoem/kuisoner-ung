<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categorys = DB::table('categories')
            ->when($request->input('name_category'), function ($query, $name) {
                return $query->where('name_category', 'like', '%' . $name . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('pages.categories.index', compact('categorys'));
    }
    public function create()
    {

        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_category' => 'required|min:1|unique:categories',


        ]);



        $data = $request->all();

        $category  = new \App\Models\category;
        $category->id_category = uuid_create();
        $category->name_category = $request->name_category;



        $category->save();

        return redirect()->route('category.index')->with('success', 'category Created Successfully');
    }

    public function edit($id_option)
    {

        $option = \App\Models\Option::findOrFail($id_option);
        return view('pages.options.edit', compact('option'));
    }

    public function update(Request $request, $id_option)
    {
        $data = $request->all();
        $option = \App\Models\Option::findOrFail($id_option);
        $option->update($data);
        return redirect()->route('option.index')->with('success', 'Option Updated Successfully');
    }

    public function destroy($id)
    {

        $option = \App\Models\Option::findOrFail($id);
        $option->delete();
        return redirect()->route('option.index')->with('success', 'Option Deleted Successfully');
    }
}
