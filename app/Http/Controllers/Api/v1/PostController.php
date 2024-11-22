<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\search;

class PostController extends Controller
{
    // All posts
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/');

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Create a new post (id: 101 always)
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'userId' => 'required|numeric',
            'title' => 'required|string|min:5|max:100',
            'id' => 'required|numeric',
            'body' => 'required|string|min:5|max:255',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'status code' => 422,
                'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::post('https://jsonplaceholder.typicode.com/posts', $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Show the post using id
    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/'. $id);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Update the post using id
    public function update(Request $request,string $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|string|min:5|max:100',
            'body' => 'required|string|min:5|max:255',
            'userId' => 'required|numeric',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'status code' => 422,
                'Validation error(s)' => $validator->errors()
            ], 422);
        }

        $response = Http::put('https://jsonplaceholder.typicode.com/posts/'. $id, $data);

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    // Delete the post using id
    public function destroy(string $id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/'. $id);

        if ($response->successful()){
            return response()->json([
                'message' => 'Deleted post with id ' . $id
            ]);
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    public function post_comments(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id . '/comments');

        if ($response->successful()){
            return response()->json($response->json());
        }

        return response()->json([
           'error' => 'Something went wrong'
        ], 404);
    }

    public function posts_quantity(int $quantity)
    {
        if ($quantity <= 0){
            return response()->json([
               'error' => 'Quantity of posts cannot be less or equals 0'
            ]);
        }

        $posts = [];

        for ($i = 1; $i <= round($quantity); $i++) {
            $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $i);

            if ($response->successful()){
                $posts[] = $response->json();
            }else{
                return response()->json([
                   'error' => 'Something went wrong'
                ], 500);
            }
        }

        return response()->json([
            'message' => 'Showing '. $quantity. ' posts',
            'posts' => $posts
        ], 200);
    }

    public function posts_keyword(string $keyword)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/');

        if ($response->successful()){
            $posts = $response->json();
        }else{
            return response()->json([
               'error' => 'Something went wrong'
            ], 500);
        }

        $foundPosts = [];

        foreach ($posts as $post){
            $body = $post["body"];

            if(str_contains($body, $keyword)){
                $foundPosts[] =[
                    'userId' => $post['userId'],
                    'id' => $post['id'],
                    'title' => $post['title'],
                    'body' => $post['body'],
                ];
            }
        }

        if (count($foundPosts) > 0){
            return response()->json([
                'message' => 'Text found',
                'quantity of posts with text' => count($foundPosts),
                'status' => 200,
                'Post(s) with found content(s)' => $foundPosts,
            ], 200);
        }

        return response()->json([
            'error' => "Provided text was not found"
        ], 404);
    }
}
