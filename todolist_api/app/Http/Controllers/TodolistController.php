<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todolist = Todolist::latest()->get();

        return response()->json([$todolist], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'desc' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $todolist = Todolist::create($data);
        return response()->json($todolist, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todolist = Todolist::find($id);
        if (!$todolist) return response()->json(['message' => 'Todolist Not Found', 404]);
        return response()->json($todolist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todolist = Todolist::find($id);
        if (!$todolist) return response()->json(['message' => 'Todolist Not Found', 404]);
        $todolist->update($request->all());
        return response()->json($todolist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todolist = Todolist::find($id);
        if (!$todolist) return response()->json(['message' => 'Todolist Not Found', 404]);
        $todolist->delete();
        return response()->json($todolist);
    }
}
