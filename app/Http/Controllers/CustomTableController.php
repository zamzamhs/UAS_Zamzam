<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomTable;

class CustomTableController extends Controller
{
    public function index()
    {
        $entries = CustomTable::all();
        return view('custom_table', compact('entries'));
    }

    public function create()
    {
        return view('custom_table.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        CustomTable::create($validatedData);
        return redirect()->route('custom_table.index')->with('success', 'Data created successfully.');
    }

    public function edit($id)
    {
        $data = CustomTable::findOrFail($id);
        return view('custom_table.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = CustomTable::findOrFail($id);
        $data->update($validatedData);
        return redirect()->route('custom_table.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $data = CustomTable::findOrFail($id);
        $data->delete();
        return redirect()->route('custom_table.index')->with('success', 'Data deleted successfully.');
    }
}
