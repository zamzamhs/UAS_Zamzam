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
        return view('custom_table_create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'field1' => 'required|string|max:255', // Field 1 must be a string and not exceed 255 characters
            'field2' => 'required|string|max:255', // Field 2 must be a string and not exceed 255 characters
            'description' => 'nullable|string',   // Description is optional but must be a string if provided
        ]);
        CustomTable::create($validatedData);
        return redirect()->route('custom_table.index')->with('success', 'Data created successfully.');
    }

    public function show($id)
    {
        $data = CustomTable::findOrFail($id); // Retrieve the entry by ID
        return view('custom_table.show', compact('data')); // Return the view with the data
    }

    public function edit($id)
    {
        $data = CustomTable::findOrFail($id);
        return view('custom_table.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'field1' => 'required|string|max:255', // Field 1 must be a string and not exceed 255 characters
            'field2' => 'required|string|max:255', // Field 2 must be a string and not exceed 255 characters
            'description' => 'nullable|string',   // Description is optional but must be a string if provided
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
