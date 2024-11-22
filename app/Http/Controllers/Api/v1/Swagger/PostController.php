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
 *                     @OA\Property(property="id", type="integer", example=1),
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
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response=422,
 *         description="Validation error(s)",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="error"),
 *             @OA\Property(property="status code", type="integer", example=422),
 *             @OA\Property(property="Validation error(s)", type="object", additionalProperties={})
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         )
 *     )
 * )
 *
 *
 * @OA\Get(
 *      path="/api/v1/posts",
 *      summary="List of all posts",
 *      tags={"Post"},
 *
 *      @OA\Response(
 *          response=200,
 *          description="List of posts",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="userId", type="integer", example=1),
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="title", type="string", example="Some title"),
 *                  @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet.")
 *              )
 *          )
 *      ),
 *
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         )
 *     )
 *  )
 *
 *
 * @OA\Get(
 *       path="/api/v1/posts/{post}",
 *       summary="Show a specific post",
 *       tags={"Post"},
 *
 *      @OA\Parameter(
 *           description="Post's id",
 *           in="path",
 *           name="post",
 *           required=true,
 *           example=1
 *       ),
 *
 *       @OA\Response(
 *           response=200,
 *           description="Post found",
 *           @OA\JsonContent(
 *               @OA\Property(property="userId", type="integer", example=1),
 *               @OA\Property(property="id", type="integer", example=1),
 *               @OA\Property(property="title", type="string", example="Some title"),
 *               @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet.")
 *           ),
 *       ),
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
 *
 * @OA\Put(
 *        path="/api/v1/posts/{post}",
 *        summary="Update a specific post",
 *        tags={"Post"},
 *
 *       @OA\Parameter(
 *            description="Post's id",
 *            in="path",
 *            name="post",
 *            required=true,
 *            example=1
 *        ),
 *
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="userId", type="integer", example=1),
 *                      @OA\Property(property="id", type="integer", example=1),
 *                      @OA\Property(property="title", type="string", example="Updated title"),
 *                      @OA\Property(property="body", type="string", example="Updated body content.")
 *                  )
 *              }
 *          )
 *      ),
 *
 *        @OA\Response(
 *            response=200,
 *            description="Post updated successfully",
 *            @OA\JsonContent(
 *                @OA\Property(property="userId", type="integer", example=1),
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="title", type="string", example="Updated title"),
 *                @OA\Property(property="body", type="string", example="Updated body content.")
 *            ),
 *        ),
 *
 *     @OA\Response(
 *         response=422,
 *         description="Validation error(s)",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="error"),
 *             @OA\Property(property="status code", type="integer", example=422),
 *             @OA\Property(property="Validation error(s)", type="object", additionalProperties={})
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         )
 *     )
 * )
 *
 * @OA\Delete(
 *        path="/api/v1/posts/{post}",
 *        summary="Delete a specific post",
 *        tags={"Post"},
 *
 *       @OA\Parameter(
 *            description="Post's id",
 *            in="path",
 *            name="post",
 *            required=true,
 *            example=1
 *        ),
 *
 *        @OA\Response(
 *            response=200,
 *            description="Post deleted successfully",
 *            @OA\JsonContent(
 *                @OA\Property(property="message", type="string", example="Deleted")
 *            ),
 *        ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Post not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Post not found")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
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
 *         @OA\Schema(type="integer"),
 *         example="3"
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
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="No posts found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         )
 *     ),
 * )
 *
 * @OA\Get(
 *         path="/api/v1/posts/search/{title}",
 *         summary="Search posts by title",
 *         tags={"Post"},
 *
 *         @OA\Parameter(
 *             description="Post title to search for",
 *             in="path",
 *             name="title",
 *             required=true,
 *             example="qui est esse"
 *         ),
 *
 *         @OA\Response(
 *             response=200,
 *             description="Successfully fetched posts",
 *             @OA\JsonContent(
 *                 @OA\Property(property="message", type="string", example="Posts found"),
 *                 @OA\Property(
 *                     property="posts",
 *                     type="array",
 *                     @OA\Items(
 *                         @OA\Property(property="userId", type="integer", example=1),
 *                         @OA\Property(property="id", type="integer", example=3),
 *                         @OA\Property(property="title", type="string", example="qui est esse"),
 *                         @OA\Property(property="body", type="string", example="est rerum tempore vitae sequi sint nihil reprehenderit dolorum omnis mollitia")
 *                     )
 *                 )
 *             ),
 *         ),
 *
 *         @OA\Response(
 *             response=404,
 *             description="No posts found with that title",
 *             @OA\JsonContent(
 *                 @OA\Property(property="error", type="string", example="No posts found")
 *             )
 *         ),
 * )
 */

class PostController extends Controller
{
    //
}
