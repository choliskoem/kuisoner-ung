<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    public function index(Request $request)
    {
        $options = DB::table('options')
            ->when($request->input('name_option'), function ($query, $name) {
                return $query->where('name_option', 'like', '%' . $name . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('pages.options.index', compact('options'));
    }

    public function create()
    {

        return view('pages.options.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_option' => 'required|min:3|unique:options',

        ]);



        $data = $request->all();

        $option  = new \App\Models\Option;
        $option->id_option = uuid_create();
        $option->name_option = $request->name_option;


        $option->save();

        return redirect()->route('option.index')->with('success', 'Option Created Successfully');
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
