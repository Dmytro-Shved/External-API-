<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    // Get all photos
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/photos');

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
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

        $validator = Validator::make($data, [
            'albumId' => 'required|numeric',
            'id' => 'required|numeric',
            'title' => 'required|string|min:5|max:100',
            'url' => 'required|url',
            'thumbnailUrl' => 'required|url',
        ]);

        if ($validator->fails()){
            return response()->json([
                'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::post('https://jsonplaceholder.typicode.com/photos', $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
    }

    // Get a photo using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/photos/' . $id);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
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

        $validator = Validator::make($data, [
            'albumId' => 'required|numeric',
            'id' => 'required|numeric',
            'title' => 'required|string|min:5|max:100',
            'url' => 'required|url',
            'thumbnailUrl' => 'required|url',
        ]);

        if ($validator->fails()){
            return response()->json([
               'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::put('https://jsonplaceholder.typicode.com/photos/' . $id, $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
    }

    // Delete a photo using id
    public function destroy(string $id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/photos/' . $id);

        if ($response->successful()){
            return [
                'message' => 'Deleted photo with id ' . $id
            ];
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
    }
}
