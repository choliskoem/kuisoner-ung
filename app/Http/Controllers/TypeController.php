<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $types = DB::table('types')
            ->when($request->input('name_type'), function ($query, $name) {
                return $query->where('name_type', 'like', '%' . $name . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('pages.types.index', compact('types'));
    }

    public function create()
    {

        return view('pages.types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_type' => 'required|min:1|unique:types',

        ]);



        $data = $request->all();

        $type  = new \App\Models\Type;
        $type->id_type = uuid_create();
        $type->name_type = $request->name_type;


        $type->save();

        return redirect()->route('type.index')->with('success', 'type Created Successfully');
    }

    public function edit($id_type)
    {

        $type = \App\Models\Type::findOrFail($id_type);
        return view('pages.types.edit', compact('type'));
    }

    public function update(Request $request, $id_type)
    {
        $data = $request->all();
        $type = \App\Models\Type::findOrFail($id_type);
        $type->update($data);
        return redirect()->route('type.index')->with('success', 'type Updated Successfully');
    }

    public function destroy($id)
    {

        $type = \App\Models\Type::findOrFail($id);
        $type->delete();
        return redirect()->route('type.index')->with('success', 'type Deleted Successfully');
    }
}
