<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Get all users
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        if($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
            'error' => 'Something went wrong',
        ], 404);
    }

    // Create a new user (id: 11 always)
    public function store()
    {
        $data = [
            'id' => 1,
            'name' => 'Name',
            'username' => 'Username',
            'email' => 'name_username@gmail.com',

            'address' => [
                'street' => 'Street test',
                'suite' => 'Suite test',
                'city' => 'Test. 000',
                'zipcode' => '00000-0000',
                'geo' => [
                    'lat' => -00.0000,
                    'lng' => 00.0000,
                ],
            ],

            'phone' => '0-000-000-0000 x00000',
            'website' => 'https://test.com/',

            'company' => [
                'name' => 'Test-Company',
                'catchPhrase' => 'Multi-testing client-server',
                'bs' => 'harness real-time e-tests',
            ],
        ];

        $validator = Validator::make($data, [
            'name' => 'required|string|min:2|max:50',
            'username' => 'required|string|min:2|max:50',
            'email' => 'required|email|max:50',

            'address' => 'array',
                'address.street' => 'min:5',
                'address.suite' => 'min:5',
                'address.city' => 'min:5',
                'address.zipcode' => 'max:50',
                'address.geo.lat' => 'numeric',
                'address.geo.lng' => 'numeric',

            'phone' => 'required|max:50',
            'website' => 'required|url',

            'company' => 'array',
                'company.name' => 'required|max:50',
                'company.catchPhrase' => 'required|max:50',
                'company.bs' => 'required|max:50'
        ]);

        // Check validation error
        if ($validator->fails()){
            return response()->json([
               'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::post('https://jsonplaceholder.typicode.com/users', $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 400);
    }

    // Get a user using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users/' . $id);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
            'error' => 'Something went wrong'
        ], 404);
    }

    // Update a user
    public function update(string $id)
    {
        $data = [
            'id' => 1,
            'name' => 'Name',
            'username' => 'Username updated',
            'email' => 'name_username_updated@gmail.com',
            'address' => [
                'street' => 'Street test updated',
                'suite' => 'Suite test updated',
                'city' => 'Test updated. 000',
                'zipcode' => 00000-0000,
                'geo' => [
                    'lat' => '-00.0000',
                    'lng' => '00.0000',
                ],
            ],
            'phone' => '0-000-000-0000 x00000',
            'website' => 'https://test.com/',
            'company' => [
                'name' => 'Test-Company updated',
                'catchPhrase' => 'Multi-testing client-server updated',
                'bs' => 'harness real-time e-tests updated',
            ],
        ];

        $validator = Validator::make($data, [
            'name' => 'required|string|min:2|max:50',
            'username' => 'required|string|min:2|max:50',
            'email' => 'required|email|max:50',

            'address' => 'array',
                'address.street' => 'min:5',
                'address.suite' => 'min:5',
                'address.city' => 'min:5',
                'address.zipcode' => 'max:50',
                'address.geo.lat' => 'numeric',
                'address.geo.lng' => 'numeric',

            'phone' => 'required|max:50',
            'website' => 'required|url',

            'company' => 'array',
                'company.name' => 'required|max:50',
                'company.catchPhrase' => 'required|max:50',
                'company.bs' => 'required|max:50'
        ]);

        // Check validation error
        if ($validator->fails()){
            return response()->json([
                'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::put('https://jsonplaceholder.typicode.com/users/' . $id, $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong',
        ]);
    }

    // Delete user using id
    public function destroy(string $id)
    {
       $response = Http::delete('https://jsonplaceholder.typicode.com/users/' . $id);

        if ($response->successful()){
            return [
                'message' => 'Deleted user with id ' . $id
            ];
        }

        return response()->json([], 404);
    }
}
