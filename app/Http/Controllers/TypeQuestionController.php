<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeQuestionController extends Controller
{
    public function index(Request $request)
    {
        $typequestion = DB::table('typequestions')
            ->leftJoin('questions as a', 'a.id_question', '=', 'typequestions.id_question')
            ->leftJoin('categories as d', 'd.id_category', '=', 'typequestions.id_category')
            ->leftJoin('types as b', 'b.id_type', '=', 'typequestions.id_type')
            ->select('typequestions.id_type_question', 'typequestions.created_at', 'a.question', 'b.name_type', 'd.name_category')
            ->when($request->input('id_type_question'), function ($query, $id_type_question) {
                return $query->where('typequestions.id_type_question', 'like', '%' . $id_type_question . '%');
            })
            ->orderBy('typequestions.created_at', 'desc')
            ->paginate(10);
        return view('pages.typequestions.index', compact('typequestion'));
    }

    public function create()
    {
        $question = \App\Models\question::all();
        $type = \App\Models\Type::all();
        $category = \App\Models\category::all();
        return view('pages.typequestions.create', compact('question', 'type', 'category'));
    }

    public function store(Request $request)
    {


        $typequestions = new \App\Models\Typequestion();
        $typequestions->id_type_question = uuid_create();
        $typequestions->id_category = $request->id_category;
        $typequestions->id_question = $request->id_question;
        $typequestions->id_type = $request->id_type;


        $typequestions->save();

        return redirect()->route('typequestion.index');
    }
}
