<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    // All comments
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/comments/');

        return response()->json($response->json());
    }

    // Create a new comment (id: 501 always)
    public function store(Request $request)
    {
        $data = [
          'postId' => $request->postId,
          'id' => $request->id,
          'name' => $request->name,
          'email' => $request->email,
          'body' => $request->body,
        ];

        $validator = Validator::make($data, [
           'postId' => 'required|numeric',
           'id' => 'required|numeric',
           'name' => 'required|string',
           'email' => 'required|string|email',
           'body' => 'required|string',
        ]);

        if ($validator->fails()){
            return response()->json([
               'Validation error(s)' => $validator->errors()
            ]);
        }

        $response = Http::post('https://jsonplaceholder.typicode.com/comments', $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
    }

    // Show comment using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/comments/' . $id);

        return response()->json($response->json());
    }

    // Update comment using id
    public function update(Request $request,string $id)
    {
        $data = [
            'postId' => $request->postId,
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
        ];

        $validator = Validator::make($data, [
            'postId' => 'required|numeric',
            'id' => 'required|numeric',
            'name' => 'required|string',
            'email' => 'required|string|email',
            'body' => 'required|string',
        ]);

        if ($validator->fails()){
            return response()->json([
               'Validation error(s)' => $validator->errors()
            ]);
        }

        $response = Http::put('https://jsonplaceholder.typicode.com/comments/' . $id, $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
    }

    // Delete comment using id
    public function destroy(string $id)
    {
        Http::delete('https://jsonplaceholder.typicode.com/comments/' . $id);

        return [
            'message' => 'Deleted comment with id ' . $id
        ];
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
        ]);
    }
}
