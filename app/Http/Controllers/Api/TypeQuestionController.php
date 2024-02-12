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

        $result = Typequestion::select(
            'sc.id_schedule',
            'sc.title_question',
            'sc.tujuan_question',
            'sc.cara_pakai_question',
            'b.id_question',
            'b.question',
            'e.id_category',
            'e.name_category',
            'd.id_option',
            'd.name_option'

            // DB::raw("GROUP_CONCAT(CONCAT(b.question, '/', b.id_question)) as name_question"),
            // DB::raw("GROUP_CONCAT(CONCAT(d.name_option, '/', d.id_option)) as name_option")
        )
            ->from('typequestions as a')
            ->leftJoin('categories as e', 'e.id_category', '=', 'a.id_category')
            ->leftJoin('questions as b', 'b.id_question', '=', 'a.id_question')
            ->leftJoin('schedule_questions as sq', 'sq.id_question', '=', 'b.id_question')
            ->leftJoin('log_schedules as ls', 'ls.id_log_schedule', '=', 'sq.id_log_schedule')
            ->leftJoin('schedules as sc', 'sc.id_schedule', '=', 'ls.id_schedule')
            ->leftJoin('type_options as c', function ($join) {
                $join->on('c.id_type', '=', 'a.id_type');
            })
            ->leftJoin('options as d', 'd.id_option', '=', 'c.id_option')
            // ->groupBy('e.id_category')
            // ->orderBy('e.id_category')
            ->get();

        // $res = array();

        // foreach ($result as $item) {
        //     $index = array_search($item['id_category'], array_column($res, "id_category"));
        //     if ($index === false) {
        //         $q = array(
        //             "id_category" => $item["id_category"],
        //             "category" => $item["name_category"],
        //             "data_category" => array([
        //                 "id_question" => $item["id_question"],
        //                 "question" => $item["question"],
        //                 "option" => array([
        //                     "id_option" => $item["id_option"],
        //                     "name_option" => $item["name_option"]
        //                 ])
        //             ])
        //         );
        //         array_push($res, $q);
        //     } else {
        //         $questionIndex = array_search($item['id_question'], array_column($res[$index]["data_category"], "id_question"));
        //         if ($questionIndex === false) {
        //             $w = array(
        //                 "id_question" => $item["id_question"],
        //                 "question" => $item["question"],
        //                 "option" => array([
        //                     "id_option" => $item["id_option"],
        //                     "name_option" => $item["name_option"]
        //                 ])
        //             );
        //             array_push($res[$index]['data_category'], $w);
        //         } else {
        //             $e = array(
        //                 "id_option" => $item["id_option"],
        //                 "name_option" => $item["name_option"]
        //             );
        //             array_push($res[$index]['data_category'][$questionIndex]['option'], $e);
        //         }
        //     }
        // }

        $res = array();

        foreach ($result as $item) {
            $index = array_search($item['id_schedule'], array_column($res, "id_schedule"));
            if ($index === false) {
                $q = array(
                    "id_schedule" => $item["id_schedule"],
                    "titel_question" => $item["title_question"],
                    "tujuan_question" => $item["tujuan_question"],
                    "cara_pakai_question" => $item["cara_pakai_question"],
                    "category" => array(
                        array(
                            "id_category" => $item["id_category"],
                            "name_category" => $item["name_category"],
                            "data_category" => array(
                                array(
                                    "id_question" => $item["id_question"],
                                    "question" => $item["question"],
                                    "option" => array(
                                        array(
                                            "id_option" => $item["id_option"],
                                            "name_option" => $item["name_option"]
                                        )
                                    )
                                )
                            )
                        )
                    )
                );
                array_push($res, $q);
            } else {
                $catIndex = array_search($item['id_category'], array_column($res[$index]["category"], "id_category"));
                if ($catIndex === false) {
                    $w = array(
                        "id_category" => $item["id_category"],
                        "name_category" => $item["name_category"],
                        "data_category" => array(
                            array(
                                "id_question" => $item["id_question"],
                                "question" => $item["question"],
                                "option" => array(
                                    array(
                                        "id_option" => $item["id_option"],
                                        "name_option" => $item["name_option"]
                                    )
                                )
                            )
                        )
                    );
                    array_push($res[$index]['category'], $w);
                } else {
                    $questionIndex = array_search($item['id_question'], array_column($res[$index]['category'][$catIndex]['data_category'], "id_question"));
                    if ($questionIndex === false) {
                        $e = array(
                            "id_question" => $item["id_question"],
                            "question" => $item["question"],
                            "option" => array(
                                array(
                                    "id_option" => $item["id_option"],
                                    "name_option" => $item["name_option"]
                                )
                            )
                        );
                        array_push($res[$index]['category'][$catIndex]['data_category'], $e);
                    } else {
                        $o = array(
                            "id_option" => $item["id_option"],
                            "name_option" => $item["name_option"]
                        );
                        array_push($res[$index]['category'][$catIndex]['data_category'][$questionIndex]['option'], $o);
                    }
                }
            }
        }





        return response()->json([
            'success' => true,
            'message' => 'List of questions',
            'data' => $res
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
