<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{

    public function index(Request $request)
    {
        $schedules = DB::table('schedules')
            ->when($request->input('schedule'), function ($query, $name) {
                return $query->where('schedule', 'like', '%' . $name . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('pages.schedules.index', compact('schedules'));
    }
    public function create()
    {
        return view('pages.schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule' => 'required|min:1|unique:schedules',
            'title_question' => 'required|min:1|unique:schedules',
            'tujuan_question' => 'required|min:1|unique:schedules',
            'cara_pakai_question' => 'required|min:1|unique:schedules',

        ]);



        $data = $request->all();

        $schedule  = new \App\Models\schedule;
        $schedule->id_schedule = uuid_create();
        $schedule->schedule = $request->schedule;
        $schedule->title_question = $request->title_question;
        $schedule->tujuan_question = $request->tujuan_question;
        $schedule->cara_pakai_question = $request->cara_pakai_question;




        $schedule->save();

        return redirect()->route('schedule.index')->with('success', 'Schedule Created Successfully');
    }

    public function destroy($id)
    {

        $option = \App\Models\schedule::findOrFail($id);
        $option->delete();
        return redirect()->route('schedule.index')->with('success', 'Option Deleted Successfully');
    }
}
