<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|min:2|max:50',
            'username' => 'required|string|min:2|max:50',
            'email' => 'required|email|max:50',

            'address' => 'required|array',
                'address.street' => 'required',
                'address.suite' => 'required',
                'address.city' => 'required',
                'address.zipcode' => 'required|max:50',

                'address.geo' => 'required|array',
                    'address.geo.lat' => 'required|numeric',
                    'address.geo.lng' => 'required|numeric',

            'phone' => 'required|string|max:50',
            'website' => 'required|url',

            'company' => 'required|array',
                'company.name' => 'required|max:50',
                'company.catchPhrase' => 'required|max:50',
                'company.bs' => 'required|max:50'
        ]);

        // Check validation error
        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'status code' => 422,
                'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::post('https://jsonplaceholder.typicode.com/users', $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
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
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|min:2|max:50',
            'username' => 'required|string|min:2|max:50',
            'email' => 'required|email|max:50',

            'address' => 'required|array',
            'address.street' => 'required',
            'address.suite' => 'required',
            'address.city' => 'required',
            'address.zipcode' => 'required|max:50',

            'address.geo' => 'required|array',
            'address.geo.lat' => 'required|numeric',
            'address.geo.lng' => 'required|numeric',

            'phone' => 'required|string|max:50',
            'website' => 'required|url',

            'company' => 'required|array',
            'company.name' => 'required|max:50',
            'company.catchPhrase' => 'required|string',
            'company.bs' => 'required|string'
        ]);

        // Check validation error
        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'status code' => 422,
                'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::put('https://jsonplaceholder.typicode.com/users/' . $id, $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong',
        ], 404);
    }

    // Delete user using id
    public function destroy(string $id)
    {
       $response = Http::delete('https://jsonplaceholder.typicode.com/users/' . $id);

        if ($response->successful()){
            return response()->json([
                'message' => 'Deleted user with id ' . $id
            ]) ;
        }

        return response()->json([
            'error' => 'Something went wrong'
        ], 404);
    }
}
