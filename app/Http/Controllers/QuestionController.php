<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $questions = DB::table('questions')
            ->when($request->input('question'), function ($query, $name) {
                return $query->where('question', 'like', '%' . $name . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('pages.questions.index', compact('questions'));
    }

    public function create()
    {

        return view('pages.questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|min:1|unique:questions',


        ]);



        $data = $request->all();

        $questions  = new \App\Models\question;
        $questions->id_question = uuid_create();
        $questions->question = $request->question;



        $questions->save();

        return redirect()->route('question.index')->with('success', 'Option Created Successfully');
    }

    public function edit($id_question)
    {

        $question = \App\Models\question::findOrFail($id_question);
        return view('pages.questions.edit', compact('question'));
    }

    public function update(Request $request, $id_question)
    {
        $data = $request->all();
        $question = \App\Models\question::findOrFail($id_question);
        $question->update($data);
        return redirect()->route('question.index')->with('success', 'question Updated Successfully');
    }

    public function destroy($id)
    {

        $question = \App\Models\question::findOrFail($id);
        $question->delete();
        return redirect()->route('question.index')->with('success', 'Option Deleted Successfully');
    }
}
