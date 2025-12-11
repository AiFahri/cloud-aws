<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::orderBy('id', 'asc')->get();
        return view('records.index', compact('records'));
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Record::create($request->only('title', 'content'));
        return redirect()->route('records.index')->with('success', 'Record created!');
    }

    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }

    public function update(Request $request, Record $record)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $record->update($request->only('title', 'content'));
        return redirect()->route('records.index')->with('success', 'Record updated!');
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('records.index')->with('success', 'Record deleted!');
    }
}

