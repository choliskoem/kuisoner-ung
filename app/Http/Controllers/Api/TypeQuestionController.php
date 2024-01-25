<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Typequestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $result = Typequestion::select('b.id_question', 'b.question', DB::raw("GROUP_CONCAT(CONCAT(d.name_option, '/', d.id_option)) as name_option"))
            ->from('typequestions as a')
            ->leftJoin('questions as b', 'b.id_question', '=', 'a.id_question')
            ->leftJoin('type_options as c', function ($join) {
                $join->on('c.id_type', '=', 'a.id_type');
            })
            ->leftJoin('options as d', 'd.id_option', '=', 'c.id_option')
            ->groupBy('b.id_question')
            ->orderBy('b.id_question')
            ->get();

        $resultOption = Option::all();

        // Format the result to match the desired structure
        $formattedResult = [];
        foreach ($result as $item) {
            $option = explode(",", $item->name_option);
            $optionarray = [];
            foreach ($option as $options) {
                $exploadray = explode("/", $options);

                array_push($optionarray, ["id_option" => $exploadray[1], "name_option" => $exploadray[0]]);
            }
            $formattedResult[] = [
                'id_question' => $item->id_question,
                'question' => $item->question,
                //    suming options are comma-separated
                'option' => $optionarray // Assuming options are comma-separated
            ];
        }

        return response()->json([
            'success' => true,
            'message' => 'List of questions',
            'data' => $formattedResult,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
