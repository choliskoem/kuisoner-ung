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
}
