<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeOptionController extends Controller
{
    public function index(Request $request)
    {
        $typeoption = DB::table('type_options')
            ->leftJoin('options', 'type_options.id_option', '=', 'options.id_option')
            ->leftJoin('types', 'type_options.id_type', '=', 'types.id_type')
            ->select('type_options.id_type_option', 'types.name_type', 'options.name_option', 'type_options.created_at')
            ->orderBy('type_options.created_at', 'desc')
            ->paginate(10);
        return view('pages.typeoptions.index', compact('typeoption'));
    }
    public function create()
    {
        $option = \App\Models\Option::all();
        $type = \App\Models\Type::all();
        return view('pages.typeoptions.create', compact('option', 'type'));
    }

    public function store(Request $request)
    {


        $typeoptions = new \App\Models\type_option();
        $typeoptions->id_type_option = uuid_create();
        $typeoptions->id_option = $request->id_option;
        $typeoptions->id_type = $request->id_type;


        $typeoptions->save();

        return redirect()->route('typeoption.index');
    }

    public function destroy($id)
    {
        $type = \App\Models\type_option::findOrFail($id);
        $type->delete();
        return redirect()->route('typeoption.index')->with('success', 'type Deleted Successfully');
    }
}
