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
 *
 *
 */

class AlbumController extends Controller
{
    //
}
