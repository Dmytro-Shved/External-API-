<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodoController extends Controller
{
    // Get all todo
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos');

        return response()->json($response->json());
    }

    // Create a new todo (id:201 always)
    public function store(Request $request)
    {
        $data = [
          'userId' => 1,
          'id' => 1,
          'title' => 'Test todo',
          'completed' => true,
        ];

        $response = Http::post('https://jsonplaceholder.typicode.com/todos', $data);

        return response()->json($response->json());
    }

    // Get a todo using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos/' . $id);

        return response()->json($response->json());
    }

    // Update a todo
    public function update(Request $request, string $id)
    {
        $data = [
            'userId' => 1,
            'id' => 1,
            'title' => 'Test todo updated',
            'completed' => true,
        ];

        $response = Http::put('https://jsonplaceholder.typicode.com/todos/' . $id, $data);

        return response()->json($response->json());
    }

   // Delete a todo using id
    public function destroy(string $id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/todos/' . $id);

        return [
           'message' => 'Deleted todo with id ' . $id
        ];
    }
}
