<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorklogController extends Controller
{
    public function index(Request $request)
    {
        $worklogs = Worklog::when($request->date, function ($query) use ($request) {
            return $query->whereDate('start_time', $request->date);
        })->get();

        return view('worklogs.index', compact('worklogs'));
    }

    public function create()
    {
        return view('worklogs.create');
    }

    public function store(Request $request)
    {
        Worklog::create($request->all());
        return redirect()->route('worklogs.index');
    }

    public function edit($id)
    {
        $worklog = Worklog::find($id);
        return view('worklogs.edit', compact('worklog'));
    }

    public function update(Request $request, $id)
    {
        $worklog = Worklog::find($id);
        $worklog->update($request->all());
        return redirect()->route('worklogs.index');
    }

    public function destroy($id)
    {
        Worklog::destroy($id);
        return redirect()->route('worklogs.index');
    }
}

