<?php

namespace App\Http\Controllers\Api\v1\Swagger;

use App\Http\Controllers\Api\v1\Controller;

/**
 * @OA\Post(
 *     path="/api/v1/posts",
 *     summary="Create a post",
 *     tags={"Post"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="userId", type="integer", example=1),
 *                     @OA\Property(property="id", type="integer", example=101),
 *                     @OA\Property(property="title", type="string", example="Some title"),
 *                     @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet.")
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Post created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="userId", type="integer", example=1),
 *             @OA\Property(property="id", type="integer", example=101),
 *             @OA\Property(property="title", type="string", example="Some title"),
 *             @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet.")
 *         )
 *     ),
 *
 *    @OA\Response(
 *        response=422,
 *        description="Validation error(s)",
 *        @OA\JsonContent(
 *            @OA\Property(property="status", type="string", example="error"),
 *            @OA\Property(property="status code", type="integer", example=422),
 *            @OA\Property(property="Validation error(s)", type="object",
 *                @OA\Property(property="userId", type="array",
 *                    @OA\Items(type="string", example="The user id field is required.")
 *                ),
 *                @OA\Property(property="title", type="array",
 *                    @OA\Items(type="string", example="The title field is required.")
 *                ),
 *                @OA\Property(property="id", type="array",
 *                    @OA\Items(type="string", example="The id field is required.")
 *                ),
 *                @OA\Property(property="body", type="array",
 *                    @OA\Items(type="string", example="The body field is required.")
 *                 )
 *            )
 *        )
 *   ),
 *
 *     @OA\Response(
 *          response=404,
 *          description="Something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong"),
 *          )
 *      ),
 * )
 *
 * @OA\Get(
 *     path="/api/v1/posts",
 *     summary="List of all posts",
 *     tags={"Post"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="List of all posts",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="userId", type="integer", example=1),
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Some title"),
 *                 @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet.")
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response="404",
 *         description="Something went wrong",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         ),
 *     ),
 * )
 *
 * @OA\Get(
 *     path="/api/v1/posts/{post}",
 *     summary="Show a specific post",
 *     tags={"Post"},
 *
 *     @OA\Parameter(
 *         description="Post's id",
 *         in="path",
 *         name="post",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Post found",
 *         @OA\JsonContent(
 *             @OA\Property(property="userId", type="integer", example=1),
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Some title"),
 *             @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet.")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Post not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Post not found")
 *         )
 *     )
 * )
 *
 * @OA\Put(
 *     path="/api/v1/posts/{post}",
 *     summary="Update a specific post",
 *     tags={"Post"},
 *
 *     @OA\Parameter(
 *         description="Post's id",
 *         in="path",
 *         name="post",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="userId", type="integer", example=1),
 *                     @OA\Property(property="id", type="integer", example=101),
 *                     @OA\Property(property="title", type="string", example="Updated title"),
 *                     @OA\Property(property="body", type="string", example="Updated body content.")
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Post updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="userId", type="integer", example=1),
 *             @OA\Property(property="id", type="integer", example=101),
 *             @OA\Property(property="title", type="string", example="Updated title"),
 *             @OA\Property(property="body", type="string", example="Updated body content.")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=422,
 *         description="Validation error(s)",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="error"),
 *             @OA\Property(property="status code", type="integer", example=422),
 *             @OA\Property(property="Validation error(s)", type="object",
 *                 @OA\Property(property="userId", type="array",
 *                     @OA\Items(type="string", example="The user id field is required.")
 *                 ),
 *                 @OA\Property(property="title", type="array",
 *                     @OA\Items(type="string", example="The title field is required.")
 *                 ),
 *                 @OA\Property(property="id", type="array",
 *                     @OA\Items(type="string", example="The id field is required.")
 *                 ),
 *                 @OA\Property(property="body", type="array",
 *                     @OA\Items(type="string", example="The body field is required.")
 *                  )
 *             )
 *         )
 *    ),
 *
 *     @OA\Response(
 *          response="404",
 *          description="Something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          ),
 *      ),
 * )
 *
 * @OA\Delete(
 *     path="/api/v1/posts/{post}",
 *     summary="Delete a specific post",
 *     tags={"Post"},
 *
 *     @OA\Parameter(
 *         description="Post's id",
 *         in="path",
 *         name="post",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Post deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Deleted post with id 1")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Post not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Post not found")
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/v1/posts/quantity/{quantity}",
 *     summary="Display a specific number of posts",
 *     tags={"Post"},
 *
 *     @OA\Parameter(
 *         description="Quantity of posts",
 *         in="path",
 *         name="quantity",
 *         required=true,
 *         example=3
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Successfully fetched posts",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Showing 3 posts"),
 *             @OA\Property(
 *                 property="posts",
 *                 type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="userId", type="integer", example=1),
 *                     @OA\Property(property="id", type="integer", example=5),
 *                     @OA\Property(property="title", type="string", example="nesciunt quas odio"),
 *                     @OA\Property(property="body", type="string", example="repudiandae veniam quaerat sunt sed alias aut fugiat sit autem sed est voluptatem omnis possimus esse voluptatibus quis est aut tenetur dolor neque")
 *                 )
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="No posts found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/v1/posts/keyword/{keyword}",
 *     summary="Search posts by text in post's body",
 *     tags={"Post"},
 *
 *     @OA\Parameter(
 *         description="Text by which the post will be found",
 *         in="path",
 *         name="keyword",
 *         required=true,
 *         example="alias"
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Successfully fetched posts",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Found posts matching the title 'qui est esse'"),
 *             @OA\Property(
 *                 property="posts",
 *                 type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="userId", type="integer", example=1),
 *                     @OA\Property(property="id", type="integer", example=6),
 *                     @OA\Property(property="title", type="string", example="nesciunt quas odio"),
 *                     @OA\Property(property="body", type="string", example="repudiandae veniam quaerat sunt sed\nalias aut fugiat sit autem sed est\nvoluptatem omnis possimus esse voluptatibus quis\nest aut tenetur dolor neque")
 *                 )
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="No posts found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="No posts found")
 *         )
 *     )
 * )
 */

class PostController extends Controller
{
    //
}
