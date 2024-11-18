<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CommentsController extends Controller
{
    // All comments
    public function index()
    {
        $response = Http::withoutVerifying()
            ->get('https://jsonplaceholder.typicode.com/comments/');

        return response()->json($response->json());
    }

    // Create a new comment (id: 501 always)
    public function store()
    {
        $data = [
          'postId' => 1,
          'id' => 1,
          'name' => 'New comment',
          'email' => 'test@gmail.com',
          'body' => 'Some text',
        ];

        $response = Http::withoutVerifying()
            ->post('https://jsonplaceholder.typicode.com/comments', $data);

        return response()->json($response->json());
    }

    // Show comment using id
    public function show(string $id)
    {
        $response = Http::withoutVerifying()
            ->get('https://jsonplaceholder.typicode.com/comments/' . $id);

        return response()->json($response->json());
    }

    // Update comment using id
    public function update(string $id)
    {
        $data = [
            'postId' => 1,
            'id' => 1,
            'name' => 'Updated comment',
            'email' => 'test_updated@gmail.com',
            'body' => 'Some text updated',
        ];

        $response = Http::withoutVerifying()
            ->put('https://jsonplaceholder.typicode.com/comments/' . $id, $data);

        return response()->json($response->json());
    }

    // Delete comment using id
    public function destroy(string $id)
    {
        Http::withoutVerifying()
            ->delete('https://jsonplaceholder.typicode.com/comments/' . $id);

        return [
            'message' => 'Deleted comment with id ' . $id
        ];
    }

    public function comments_post(string $id)
    {
        $response = Http::withoutVerifying()
            ->get('https://jsonplaceholder.typicode.com/comments', [
                'postId' => $id
            ]);

        return response()->json($response->json());
    }
}
