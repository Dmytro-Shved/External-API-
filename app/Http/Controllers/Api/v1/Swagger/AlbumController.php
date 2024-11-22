<?php

namespace App\Http\Controllers\Api\v1\Swagger;

use App\Http\Controllers\Api\v1\Controller;

/**
 * @OA\Get(
 *      path="/api/v1/albums",
 *      summary="List of all albums",
 *      tags={"Album"},
 *      @OA\Response(
 *          response=200,
 *          description="List of albums",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="userId", type="integer", example=1),
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="title", type="string", example="Some album title")
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Albums not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 * )
 *
 * @OA\Post(
 *      path="/api/v1/albums",
 *      summary="Create a new album",
 *      tags={"Album"},
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              @OA\Property(property="userId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Some title")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Album created successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="userId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Some title")
 *          )
 *      ),
 *      @OA\Response(
 *       response=422,
 *       description="Validation error(s)",
 *       @OA\JsonContent(
 *           @OA\Property(property="status", type="string", example="error"),
 *           @OA\Property(property="status code", type="integer", example=422),
 *           @OA\Property(property="Validation error(s)", type="object",
 *               @OA\Property(property="userId", type="array",
 *                   @OA\Items(type="string", example="The user id field is required.")
 *               ),
 *               @OA\Property(property="id", type="array",
 *                   @OA\Items(type="string", example="The id field is required.")
 *               ),
 *               @OA\Property(property="title", type="array",
 *                   @OA\Items(type="string", example="The title field is required.")
 *               )
 *           )
 *       )
 *  ),
 * )
 *
 * @OA\Get(
 *      path="/api/v1/albums/{album}",
 *      summary="Show a specific album",
 *      tags={"Album"},
 *      @OA\Parameter(
 *          description="Album's id",
 *          in="path",
 *          name="album",
 *          required=true,
 *          @OA\Schema(type="integer"),
 *          example=1
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Album found",
 *          @OA\JsonContent(
 *              @OA\Property(property="userId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Some title")
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Album not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Album not found")
 *          )
 *      )
 * )
 *
 * @OA\Put(
 *      path="/api/v1/albums/{album}",
 *      summary="Update a specific album",
 *      tags={"Album"},
 *      @OA\Parameter(
 *          description="Album's id",
 *          in="path",
 *          name="album",
 *          required=true,
 *          @OA\Schema(type="integer"),
 *          example=1
 *      ),
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              @OA\Property(property="userId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Title updated")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Album updated successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="userId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Title updated")
 *          )
 *      ),
 *      @OA\Response(
 *       response=422,
 *       description="Validation error(s)",
 *       @OA\JsonContent(
 *           @OA\Property(property="status", type="string", example="error"),
 *           @OA\Property(property="status code", type="integer", example=422),
 *           @OA\Property(property="Validation error(s)", type="object",
 *               @OA\Property(property="userId", type="array",
 *                   @OA\Items(type="string", example="The user id field is required.")
 *               ),
 *               @OA\Property(property="id", type="array",
 *                   @OA\Items(type="string", example="The id field is required.")
 *               ),
 *               @OA\Property(property="title", type="array",
 *                   @OA\Items(type="string", example="The title field is required.")
 *               )
 *           )
 *       )
 *  ),
 * )
 *
 * @OA\Delete(
 *      path="/api/v1/albums/{album}",
 *      summary="Delete a specific album",
 *      tags={"Album"},
 *      @OA\Parameter(
 *          description="Album's id",
 *          in="path",
 *          name="album",
 *          required=true,
 *          @OA\Schema(type="integer"),
 *          example=1
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Album deleted successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Deleted album with id 1")
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Album not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Album not found")
 *          )
 *      ),
 * )
 */


class AlbumController extends Controller
{
    //
}
