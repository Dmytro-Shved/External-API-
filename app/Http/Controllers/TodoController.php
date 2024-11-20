<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    // Get all todo
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos');

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Create a new todo (id:201 always)
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'userId' => 'required|numeric',
            'id' => 'required|numeric',
            'title' => 'required|string|min:5|max:100',
            'completed' => 'required|bool',
        ]);

        if ($validator->fails()){
            return response()->json([
                'Validation error(s)' => $validator->errors()
            ],422);
        }

        $response = Http::post('https://jsonplaceholder.typicode.com/todos', $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
            'error' => 'Something went wrong'
        ], 404);
    }

    // Get a todo using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos/' . $id);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Update a todo
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'userId' => 'required|numeric',
            'id' => 'required|numeric',
            'title' => 'required|string|min:5|max:100',
            'completed' => 'required|bool',
        ]);

        if ($validator->fails()){
            return response()->json([
               'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::put('https://jsonplaceholder.typicode.com/todos/' . $id, $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
            'error' => 'Something went wrong'
        ], 404);
    }

    // Delete a todo using id
    public function destroy(string $id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/todos/' . $id);

        if ($response->successful()){
            return response()->json([
                'message' => 'Deleted todo with id ' . $id
            ]);
        }

        return response()->json([
            'error' => 'Something went wrong'
        ], 404);
    }
}
