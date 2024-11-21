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
 *          description="ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="userId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Some title"),
 *              @OA\Property(property="body", type="string", example="Lorem ipsum dolor sit amet."),
 *          ),
 *      ),
 *  ),
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
 */
class PostController extends Controller
{
    //
}
