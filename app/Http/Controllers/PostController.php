<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // All posts
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/');

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Create a new post (id: 101 always)
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|string|min:5|max:100',
            'body' => 'required|string|min:5|max:255',
            'userId' => 'required|numeric',
        ]);

        if ($validator->fails()){
            return response()->json([
               'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::post('https://jsonplaceholder.typicode.com/posts', $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Show the post using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/'. $id);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Update the post using id
    public function update(Request $request,string $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|string|min:5|max:100',
            'body' => 'required|string|min:5|max:255',
            'userId' => 'required|numeric',
        ]);

        if ($validator->fails()){
            return response()->json([
               'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::put('https://jsonplaceholder.typicode.com/posts/'. $id, $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Delete the post using id
    public function destroy(string $id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/'. $id);

        if ($response->successful()){
            return response()->json([
                'message' => 'Deleted post with id ' . $id
            ]);
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    public function post_comments(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id . '/comments');

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }
}
