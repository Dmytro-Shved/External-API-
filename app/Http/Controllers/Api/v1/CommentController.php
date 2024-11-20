<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    // All comments
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/comments/');

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Create a new comment (id: 501 always)
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
           'postId' => 'required|numeric',
           'id' => 'required|numeric',
           'name' => 'required|string',
           'email' => 'required|string|email',
           'body' => 'required|string',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'status code' => 422,
                'Validation error(s)' => $validator->errors()
            ]);
        }

        $response = Http::post('https://jsonplaceholder.typicode.com/comments', $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Show comment using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/comments/' . $id);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Update comment using id
    public function update(Request $request,string $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'postId' => 'required|numeric',
            'id' => 'required|numeric',
            'name' => 'required|string',
            'email' => 'required|string|email',
            'body' => 'required|string',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'status code' => 422,
                'Validation error(s)' => $validator->errors()
            ]);
        }

        $response = Http::put('https://jsonplaceholder.typicode.com/comments/' . $id, $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Delete comment using id
    public function destroy(string $id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/comments/' . $id);

        if ($response->successful()){
            return response()->json([
                'message' => 'Deleted comment with id ' . $id
            ]);
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    public function comments_post(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/comments', [
                'postId' => $id
            ]);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }
}
