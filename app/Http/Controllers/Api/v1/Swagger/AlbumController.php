<?php

namespace App\Http\Controllers\Api\v1\Swagger;

use App\Http\Controllers\Api\v1\Controller;

/**
 * @OA\Get(
 *      path="/api/v1/albums",
 *      summary="List of all albums",
 *      tags={"Album"},
 *
 *      @OA\Response(
 *          response=200,
 *          description="List of albums",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="userId", type="integer", example=1),
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="title", type="string", example="Some album title"),
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Post(
 *      path="/api/v1/albums",
 *      summary="Create a new album",
 *      tags={"Album"},
 *
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="userId", type="integer", example=1),
 *                      @OA\Property(property="id", type="integer", example=1),
 *                      @OA\Property(property="title", type="string", example="Some title"),
 *                  )
 *              }
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="userId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Some title"),
 *          ),
 *      ),
 *  ),
 *
 * @OA\Get(
 *        path="/api/v1/albums/{album}",
 *        summary="Show a specific album",
 *        tags={"Album"},
 *
 *       @OA\Parameter(
 *            description="Alhbum's id",
 *            in="path",
 *            name="album",
 *            required=true,
 *            example=1
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="ok",
 *            @OA\JsonContent(
 *                @OA\Property(property="userId", type="integer", example=1),
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="title", type="string", example="Some title"),
 *            ),
 *        ),
 *    ),
 *
 * @OA\Put(
 *         path="/api/v1/albums/{album}",
 *         summary="Update a specific album",
 *         tags={"Album"},
 *
 *        @OA\Parameter(
 *             description="Album's id",
 *             in="path",
 *             name="album",
 *             required=true,
 *             example=1
 *         ),
 *
 *      @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="userId", type="integer", example=1),
 *                       @OA\Property(property="id", type="integer", example=1),
 *                       @OA\Property(property="title", type="string", example="Title updated"),
 *                   )
 *               }
 *           )
 *       ),
 *
 *         @OA\Response(
 *             response=200,
 *             description="updated",
 *             @OA\JsonContent(
 *                 @OA\Property(property="userId", type="integer", example=1),
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Title updated"),
 *             ),
 *         ),
 *     ),
 *
 * @OA\Delete(
 *         path="/api/v1/albums/{album}",
 *         summary="Delete a specific album",
 *         tags={"Album"},
 *
 *        @OA\Parameter(
 *             description="Album's id",
 *             in="path",
 *             name="album",
 *             required=true,
 *             example=1
 *         ),
 *         @OA\Response(
 *             response=200,
 *             description="ok",
 *             @OA\JsonContent(
 *                 @OA\Property(property="message", type="string", example="deleted"),
 *             ),
 *         ),
 *     ),
 */

class AlbumController extends Controller
{
    //
}
