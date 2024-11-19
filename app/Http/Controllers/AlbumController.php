<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlbumController extends Controller
{
    // Get all albums
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/albums/');

        return response()->json($response->json());
    }

    // Create a new album (id: 101 always)
    public function store()
    {
        $data = [
          'userId' => 1,
          'id' => 1,
          'title' => 'Test album title',
        ];

        $response = Http::post('https://jsonplaceholder.typicode.com/albums', $data);

        return response()->json($response->json());
    }

    // Show album using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/albums/' . $id);

        return response()->json($response->json());
    }

    // Update a new album
    public function update(string $id)
    {
        $data = [
            'userId' => 1,
            'id' => 1,
            'title' => 'Test album title updated',
        ];

        $response = Http::put('https://jsonplaceholder.typicode.com/albums/' . $id, $data);

        return response()->json($response->json());
    }

    // Delete an album
    public function destroy(string $id)
    {
        Http::delete('https://jsonplaceholder.typicode.com/albums/' . $id);

        return [
            'message' => 'Deleted album with id ' . $id
        ];
    }
}
