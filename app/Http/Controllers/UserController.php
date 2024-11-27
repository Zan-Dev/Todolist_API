<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\Catch_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();

        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'username' => 'required|min:5',
                'email' => 'required|email',         
                'password' => 'required|confirmed|min:8',
            ]);

            $data['password'] = Hash::make($request->password);
    
            User::create($data);            
            
            return response()->json([
                'message' => 'successfully create a user',
                'data' => $data
            ], 201);

        } catch (ValidationException $e) {
            
            return response()->json([
                'message' => 'data validation fail',
                'error' => $e->getMessage(),
            ], 422);

        } catch (Exception $e){

            return response()->json([
                'message' => 'error when saving data',
                'error' => $e->getMessage(),
            ], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        
        if(!$user){
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }

        return response()->json([
            'message' => 'data found',
            'data' => $user
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       

        try {
            $data = $request->validate([
                'username' => 'required|min:5',
                'email' => 'required|email',    
                'password' => 'nullable|confirmed|min:8',
            ]);

            $user = User::find($id);
            
            if(!$user){
                return response()->json([
                    'message' => 'data not found'
                ], 404);
            }

            if($request->has('password')){$data['password'] = Hash::make($request->password);}
            else{unset($data['password']);}

            $user->update($data);

            return response()->json([
                'message' => 'data successfully modified',
                'data' => $data
            ], 200);
            

        } catch (ValidationException $e) {
            
            return response()->json([
                'message' => 'data validation fail',
                'error' => $e->getMessage()
            ],422);
        } catch (Exception $e){
            
            return response()->json([
                'message' => 'error when update data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        
        if(!$user){
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }        

        $user->delete();

        return response()->json([
            'message' => 'data successfully deleted',
            'data' => $user
        ], 200);
    }
}
