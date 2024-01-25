<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeOptionController extends Controller
{
    public function index(Request $request)
    {
        $typeoptions = DB::table('type_options')
            ->leftJoin('options', 'type_options.id_option', '=', 'options.id_option')
            ->leftJoin('types', 'type_options.id_type', '=', 'types.id_type')
            ->orderBy('type_options.created_at', 'desc')
            ->paginate(10);
        return view('pages.typeoptions.index', compact('typeoptions'));
    }

    public function destroy($id)
    {
        $type = \App\Models\type_option::findOrFail($id);
        $type->delete();
        return redirect()->route('typeoption.index')->with('success', 'type Deleted Successfully');
    }
}
