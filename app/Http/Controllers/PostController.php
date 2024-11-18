<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    // All posts
    public function index()
    {
        $response = Http::withoutVerifying()
            ->get('https://jsonplaceholder.typicode.com/posts/');

        return response()->json($response->json());
    }

    // Create a new post (id: 101 always)
    public function create()
    {
        $data = [
            'title' => 'Lorem ipsum',
            'body' => 'Lorem ipsum dolor sit amet.',
            'userId' => '1',
        ];

        $response = Http::withoutVerifying()
            ->post('https://jsonplaceholder.typicode.com/posts', $data);

        return response()->json($response->json());
    }

    // Show the post using id
    public function show(string $id)
    {
        $response = Http::withoutVerifying()
            ->get('https://jsonplaceholder.typicode.com/posts/'. $id);

        return response()->json($response->json());
    }

    // Update the post using id
    public function update(string $id)
    {
        $data = [
            'title' => 'Updated title',
            'body' => 'Updated body',
            'userId' => 1,
        ];

        $response = Http::withoutVerifying()
            ->put('https://jsonplaceholder.typicode.com/posts/'. $id, $data);

        return response()->json($response->json());
    }

    // Delete the post using id
    public function destroy(string $id)
    {
        $response = Http::withoutVerifying()
            ->delete('https://jsonplaceholder.typicode.com/posts/'. $id);

        return [
            'message' => 'Deleted post with id ' . $id
        ];
    }
}
