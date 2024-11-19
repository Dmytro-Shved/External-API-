<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PhotoController extends Controller
{
    // Get all photos
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/photos');

        return response()->json($response->json());
    }

    // Create a new photo (id: 5001 always)
    public function store()
    {
        $data = [
          'albumId' => 1,
          'id' => 1,
          'title' => 'Test title',
          'url' => 'https://test.url.com/3/2c1',
          'thumbnailUrl' => 'https://test.url.com/150/3/2c1',
        ];

        $response = Http::post('https://jsonplaceholder.typicode.com/photos', $data);

        return response()->json($response->json());
    }

    // Get a photo using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/photos/' . $id);

        return response()->json($response->json());
    }

    // Update a photo using id
    public function update(string $id)
    {
        $data = [
            'albumId' => 1,
            'id' => 1,
            'title' => 'Test title updated',
            'url' => 'https://updated.url.com/3/2c1',
            'thumbnailUrl' => 'https://updated.url.com/150/3/2c1',
        ];

        $response = Http::put('https://jsonplaceholder.typicode.com/photos/' . $id, $data);

        return response()->json($response->json());
    }

    // Delete a photo using id
    public function destroy(string $id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/photos/' . $id);

        return [
          'message' => 'Deleted photo with id ' . $id
        ];
    }
}
