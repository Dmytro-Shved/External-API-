<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    // Get all users
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        return response()->json($response->json());
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
              'zipcode' => 00000-0000,
              'geo' => [
                  'lat' => '-00.0000',
                  'lng' => '00.0000',
              ],
          ],
            'phone' => '0-000-000-0000 x00000',
            'website' => 'test.org',
            'company' => [
                'name' => 'Test-Company',
                'catchPhrase' => 'Multi-testing client-server',
                'bs' => 'harness real-time e-tests',
            ],
        ];

        $response = Http::post('https://jsonplaceholder.typicode.com/users', $data);

        return response()->json($response->json());
    }

    // Get a user using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users/' . $id);

        return response()->json($response->json());
    }

    // Update a user
    public function update(Request $request, string $id)
    {
        $data = [
            'id' => 1,
            'name' => 'Name updated',
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
            'website' => 'test_updated.org',
            'company' => [
                'name' => 'Test-Company updated',
                'catchPhrase' => 'Multi-testing client-server updated',
                'bs' => 'harness real-time e-tests updated',
            ],
        ];

        $response = Http::put('https://jsonplaceholder.typicode.com/users/' . $id, $data);

        return response()->json($response->json());
    }

    // Delete user using id
    public function destroy(string $id)
    {
        Http::delete('https://jsonplaceholder.typicode.com/users/' . $id);

        return [
            'message' => 'Deleted user with id ' . $id
        ];
    }
}
