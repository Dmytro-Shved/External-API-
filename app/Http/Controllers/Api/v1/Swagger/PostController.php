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
 *                     @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet."),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="title", type="string", example="Some title"),
 *             @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet."),
 *             @OA\Property(property="userId", type="integer", example=1),
 *         ),
 *     ),
 * ),
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
 *      )
 *  )
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
 *       @OA\Response(
 *           response=200,
 *           description="ok",
 *           @OA\JsonContent(
 *               @OA\Property(property="userId", type="integer", example=1),
 *               @OA\Property(property="id", type="integer", example=1),
 *               @OA\Property(property="title", type="string", example="Some title"),
 *               @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet."),
 *           ),
 *       ),
 *   ),
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
 *                      @OA\Property(property="title", type="string", example="Title updated"),
 *                      @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet updated."),
 *                  )
 *              }
 *          )
 *      ),
 *
 *        @OA\Response(
 *            response=200,
 *            description="updated",
 *            @OA\JsonContent(
 *                @OA\Property(property="userId", type="integer", example=1),
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="title", type="string", example="Title updated"),
 *                @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet updated."),
 *            ),
 *        ),
 *    ),
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
 *        @OA\Response(
 *            response=200,
 *            description="ok",
 *            @OA\JsonContent(
 *                @OA\Property(property="message", type="string", example="deleted"),
 *            ),
 *        ),
 *    ),
 *
 * @OA\Get(
 *        path="/api/v1/posts/keyword/{keyword}",
 *        summary="Displays posts containing a specific keyword",
 *        tags={"Post"},
 *
 *        @OA\Parameter(
 *              description="Keyword to search in posts",
 *              in="path",
 *              name="keyword",
 *              required=true,
 *              @OA\Schema(type="string"),
 *              example="alias"
 *        ),
 *
 *        @OA\Response(
 *            response=200,
 *            description="Success",
 *            @OA\JsonContent(
 *                @OA\Property(property="message", type="string", example="Text found"),
 *                @OA\Property(property="quantity of posts with text", type="integer", example=5),
 *                @OA\Property(property="status", type="integer", example=200),
 *                @OA\Property(
 *                    property="Post(s) with found content(s)",
 *                    type="array",
 *                    @OA\Items(
 *                        @OA\Property(property="userId", type="integer", example=1),
 *                        @OA\Property(property="id", type="integer", example=5),
 *                        @OA\Property(property="title", type="string", example="nesciunt quas odio"),
 *                        @OA\Property(property="body", type="string", example="repudiandae veniam quaerat sunt sed alias aut fugiat sit autem sed est voluptatem omnis possimus esse voluptatibus quis est aut tenetur dolor neque")
 *                    )
 *                )
 *            )
 *        ),
 *
 *        @OA\Response(
 *            response=404,
 *            description="No posts found",
 *            @OA\JsonContent(
 *                @OA\Property(property="error", type="string", example="Provided text was not found")
 *            ),
 *        ),
 *    ),
 *
 * @OA\Get(
 *         path="/api/v1/posts/quantity/{quantity}",
 *         summary="Displays specific number of posts",
 *         tags={"Post"},
 *
 *         @OA\Parameter(
 *               description="Quantity of posts",
 *               in="path",
 *               name="quantity",
 *               required=true,
 *               @OA\Schema(type="integer"),
 *               example="1"
 *         ),
 *
 *         @OA\Response(
 *             response=200,
 *             description="ok",
 *             @OA\JsonContent(
 *                 @OA\Property(property="message", type="string", example="Showing 3 posts"),
 *                 @OA\Property(
 *                     property="posts",
 *                     type="array",
 *                     @OA\Items(
 *                         @OA\Property(property="userId", type="integer", example=1),
 *                         @OA\Property(property="id", type="integer", example=5),
 *                         @OA\Property(property="title", type="string", example="nesciunt quas odio"),
 *                         @OA\Property(property="body", type="string", example="repudiandae veniam quaerat sunt sed alias aut fugiat sit autem sed est voluptatem omnis possimus esse voluptatibus quis est aut tenetur dolor neque")
 *                     )
 *                 )
 *             )
 *         ),
 *
 *         @OA\Response(
 *             response=404,
 *             description="No posts found",
 *             @OA\JsonContent(
 *                 @OA\Property(property="error", type="string", example="Something went wrong")
 *             ),
 *         ),
 *     ),
 *
 * @OA\Get(
 *     path="/api/v1/posts/{post}/comments",
 *     summary="List of comments for specific post",
 *     tags={"Post"},
 *
 *     @OA\Parameter(
 *         description="Post's id",
 *         in="path",
 *         name="post",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *             example="1"
 *    ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="postId", type="integer", example=3),
 *                 @OA\Property(property="id", type="integer", example=11),
 *                 @OA\Property(property="name", type="string", example="fugit labore quia mollitia quas deserunt nostrum sunt"),
 *                 @OA\Property(property="email", type="string", example="Veronica_Goodwin@timmothy.net"),
 *                 @OA\Property(property="body", type="string", example="ut dolorum nostrum id quia aut est\nfuga est inventore vel eligendi explicabo quis consectetur\naut occaecati repellat id natus quo est\nut blanditiis quia ut vel ut maiores ea")
 *             ),
 *         ),
 *    ),
 *
 *        @OA\Response(
 *            response=404,
 *            description="No comments found",
 *            @OA\JsonContent(
 *                @OA\Property(property="error", type="string", example="No comments available"),
 *            ),
 *        ),
 * ),
 */
class PostController extends Controller
{
    //
}
