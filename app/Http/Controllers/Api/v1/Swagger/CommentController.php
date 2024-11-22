<?php

namespace App\Http\Controllers\Api\v1\Swagger;

use App\Http\Controllers\Api\v1\Controller;

/**
 * @OA\Get(
 *       path="/api/v1/comments",
 *       summary="List of all comments",
 *       tags={"Comment"},
 *
 *       @OA\Response(
 *           response=200,
 *           description="List of albums",
 *           @OA\JsonContent(
 *               type="array",
 *               @OA\Items(
 *                   type="object",
 *                   @OA\Property(property="postId", type="integer", example=1),
 *                   @OA\Property(property="id", type="integer", example=1),
 *                   @OA\Property(property="name", type="string", example="Lorem ipsum"),
 *                   @OA\Property(property="email", type="string", example="example@email.com"),
 *                   @OA\Property(property="body", type="string", example="Blanditiis corporis dolore dolorem eaque fuga"),
 *               ),
 *           )
 *       )
 *   ),
 *
 * @OA\Post(
 *       path="/api/v1/comments",
 *       summary="Create a new comment",
 *       tags={"Comment"},
 *
 *       @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="postId", type="integer", example=1),
 *                       @OA\Property(property="id", type="integer", example=1),
 *                       @OA\Property(property="name", type="string", example="New comment"),
 *                       @OA\Property(property="email", type="string", example="newexample@email.com"),
 *                       @OA\Property(property="body", type="string", example="New post"),
 *                   )
 *               }
 *           )
 *       ),
 *
 *       @OA\Response(
 *           response=200,
 *           description="ok",
 *           @OA\JsonContent(
 *               @OA\Property(property="postId", type="integer", example=1),
 *               @OA\Property(property="id", type="integer", example=1),
 *               @OA\Property(property="name", type="string", example="New comment"),
 *               @OA\Property(property="email", type="string", example="newexample@email.com"),
 *               @OA\Property(property="body", type="string", example="New post"),
 *           ),
 *       ),
 *   ),
 *
 * @OA\Get(
 *         path="/api/v1/comments/{comment}",
 *         summary="Show a specific comment",
 *         tags={"Comment"},
 *
 *        @OA\Parameter(
 *             description="Comment's id",
 *             in="path",
 *             name="comment",
 *             required=true,
 *             example=1
 *         ),
 *         @OA\Response(
 *             response=200,
 *             description="ok",
 *             @OA\JsonContent(
 *                 @OA\Property(property="postId", type="integer", example=1),
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="New comment"),
 *                 @OA\Property(property="email", type="string", example="newexample@email.com"),
 *                 @OA\Property(property="body", type="string", example="New post"),
 *             ),
 *         ),
 *     ),
 *
 * @OA\Put(
 *       path="/api/v1/comments/{id}",
 *       summary="Update a specific comment",
 *       tags={"Comment"},
 *
 *       @OA\Parameter(
 *           name="id",
 *           in="path",
 *           description="ID of the comment to update",
 *           required=true,
 *           @OA\Schema(type="string"),
 *           example="1"
 *       ),
 *
 *       @OA\RequestBody(
 *           description="Data for updating the comment",
 *           required=true,
 *           @OA\JsonContent(
 *               @OA\Property(property="postId", type="integer", example=1),
 *               @OA\Property(property="id", type="integer", example=1),
 *               @OA\Property(property="name", type="string", example="Some name"),
 *               @OA\Property(property="email", type="string", example="example@email.com"),
 *               @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet.")
 *           )
 *       ),
 *
 *       @OA\Response(
 *           response=200,
 *           description="Comment updated successfully",
 *           @OA\JsonContent(
 *               @OA\Property(property="postId", type="integer", example=1),
 *               @OA\Property(property="id", type="integer", example=1),
 *               @OA\Property(property="name", type="string", example="Some name"),
 *               @OA\Property(property="email", type="string", example="example@email.com"),
 *               @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet.")
 *           )
 *       ),
 *
 *       @OA\Response(
 *           response=422,
 *           description="Validation error(s)",
 *           @OA\JsonContent(
 *               @OA\Property(property="status", type="string", example="error"),
 *               @OA\Property(property="status code", type="integer", example=422),
 *               @OA\Property(property="Validation error(s)", type="object", additionalProperties={})
 *           )
 *       ),
 *
 *       @OA\Response(
 *           response=404,
 *           description="Comment not found or something went wrong",
 *           @OA\JsonContent(
 *               @OA\Property(property="error", type="string", example="Something went wrong")
 *           )
 *       )
 *  ),
 *
 */

class CommentController extends Controller
{
    //
}
