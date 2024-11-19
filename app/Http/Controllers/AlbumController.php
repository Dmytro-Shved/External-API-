<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    // Get all albums
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/albums/');

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
    }

    // Create a new album (id: 101 always)
    public function store()
    {
        $data = [
          'userId' => 1,
          'id' => 1,
          'title' => 'Test album title',
        ];

        $validator = Validator::make($data, [
            'userId' => 'required|numeric',
            'id' => 'required|numeric',
            'title' => 'required|string|min:5|max:100',
        ]);

        if ($validator->fails()){
            return response()->json([
                'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::post('https://jsonplaceholder.typicode.com/albums', $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
    }

    // Show album using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/albums/' . $id);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
    }

    // Update a new album
    public function update(string $id)
    {
        $data = [
            'userId' => 1,
            'id' => 1,
            'title' => 'Test album title updated',
        ];

        $validator = Validator::make($data, [
            'userId' => 'required|numeric',
            'id' => 'required|numeric',
            'title' => 'required|string|min:5|max:100',
        ]);

        if ($validator->fails()){
            return response()->json([
               'Validation error(s)' => $validator->errors()
            ]);
        }

        $response = Http::put('https://jsonplaceholder.typicode.com/albums/' . $id, $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
            'error' => 'Something went wrong'
        ]);
    }

    // Delete an album
    public function destroy(string $id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/albums/' . $id);

        if ($response->successful()){
            return [
                'message' => 'Deleted album with id ' . $id
            ];
        }

        return response()->json([
           'error' => 'Something went wrong'
        ]);
    }
}
