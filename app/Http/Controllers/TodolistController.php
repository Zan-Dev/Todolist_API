<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Resources\TodolistResource;
use App\Models\Todolist;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todolist = Todolist::latest()->get();

        // return response()->json([$todolist], 200);
        return TodolistResource::collection($todolist);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string',
                'desc' => 'required|string',
                'status' => 'required|boolean|in:0,1',
            ]);
    
            $todolist = Todolist::create($data);

            return response()->json([
                'message' => 'Successfully add data',
                'data' => new TodolistResource($todolist),
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'data validation fail',
                'errors' => $e->getMessage()
            ], 422);

        } catch (Exception $e){
            Log::error("error when saving data". $e->getMessage());

            return response()->json([
                'message' => 'error when saving data',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todolist = Todolist::find($id);
        if (!$todolist) return response()->json(['message' => 'Todolist Not Found'], 404);
        return response()->json($todolist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {                          
        try {
            $data = $request->validate([
                'title' => 'required|string',
                'desc' => 'required|string',
                'status' => 'required|boolean|in:0,1',
            ]);
    
            $todolist = Todolist::find($id);

            if (!$todolist) return response()->json(['message' => 'Todolist Not Found'],404);

            $todolist->update($data);

            return response()->json([
                'status' => 'updated',
                'message' => 'Successfully update data',
                'data' => new TodolistResource($todolist),
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'data validation fail',
                'errors' => $e->getMessage()
            ], 422);
            
        } catch (Exception $e){
            Log::error("error when update data". $e->getMessage());

            return response()->json([
                'message' => 'error when update data',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todolist = Todolist::find($id);
        if (!$todolist) return response()->json([           
            'message' => 'Todolist Not Found'], 404);
        $todolist->delete();
        return response()->json([ 
            'status' => 'deleted',
            'data' => $todolist], 200);
    }
}
