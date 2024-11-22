<?php

namespace App\Http\Controllers\Api\v1\Swagger;

/**
 * @OA\Get(
 *     path="/api/v1/photos",
 *     summary="List of all photos",
 *     tags={"Photo"},
 *
 *     @OA\Response(
 *         response="200",
 *         description="ok",
 *         @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="albumId", type="integer", example=1),
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="title", type="string", example="Sample photo title"),
 *                  @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
 *                  @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952")
 *              )
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response="404",
 *          description="Something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 * ),
 *
 * @OA\Post(
 *      path="/api/v1/photos",
 *      summary="Create a new photo",
 *      tags={"Photo"},
 *
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="albumId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Some title"),
 *              @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
 *              @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952")
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="Photo created successfully",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="albumId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Some title"),
 *              @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
 *              @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952")
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=422,
 *          description="Validation error(s)",
 *          @OA\JsonContent(
 *              @OA\Property(property="status", type="string", example="error"),
 *              @OA\Property(property="status code", type="integer", example=422),
 *              @OA\Property(property="Validation error(s)", type="object",
 *                  @OA\Property(property="albumId", type="array",
 *                      @OA\Items(type="string", example="The albumId field is required.")
 *                  ),
 *                  @OA\Property(property="id", type="array",
 *                      @OA\Items(type="string", example="The id field is required.")
 *                  ),
 *                  @OA\Property(property="title", type="array",
 *                      @OA\Items(type="string", example="The title field is required.")
 *                  ),
 *                  @OA\Property(property="url", type="array",
 *                      @OA\Items(type="string", example="The url field is required.")
 *                  ),
 *                  @OA\Property(property="thumbnailUrl", type="array",
 *                      @OA\Items(type="string", example="The thumbnail url field is required.")
 *                  )
 *              )
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=404,
 *          description="Something went wrong or resource not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 *  ),
 *
 * @OA\Get(
 *     path="/api/v1/photos/{photo}",
 *     summary="Show a specific photo",
 *     tags={"Photo"},
 *
 *     @OA\Parameter(
 *          description="Photo's id",
 *          in="path",
 *          name="photo",
 *          required=true,
 *          example=1
 *      ),
 *
 *     @OA\Response(
 *         response="200",
 *         description="Photo found",
 *         @OA\JsonContent(
 *             @OA\Property(property="albumId", type="integer", example=1),
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Sample photo title"),
 *             @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
 *             @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952")
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response=404,
 *          description="Photo not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Photo not found")
 *          )
 *      )
 * ),
 *
 * @OA\Put(
 *      path="/api/v1/photos/{id}",
 *      summary="Update a specific photo",
 *      tags={"Photo"},
 *
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Photo's id",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="albumId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=101),
 *              @OA\Property(property="title", type="string", example="Updated photo title"),
 *              @OA\Property(property="url", type="string", example="https://example.com/updated-photo.jpg"),
 *              @OA\Property(property="thumbnailUrl", type="string", example="https://example.com/updated-thumbnail.jpg")
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="Photo updated successfully",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="albumId", type="integer", example=1),
 *              @OA\Property(property="id", type="integer", example=101),
 *              @OA\Property(property="title", type="string", example="Updated photo title"),
 *              @OA\Property(property="url", type="string", example="https://example.com/updated-photo.jpg"),
 *              @OA\Property(property="thumbnailUrl", type="string", example="https://example.com/updated-thumbnail.jpg")
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=422,
 *          description="Validation error(s)",
 *          @OA\JsonContent(
 *              @OA\Property(property="status", type="string", example="error"),
 *              @OA\Property(property="status code", type="integer", example=422),
 *              @OA\Property(property="Validation error(s)", type="object",
 *                  @OA\Property(property="albumId", type="array",
 *                      @OA\Items(type="string", example="The albumId field is required.")
 *                  ),
 *                  @OA\Property(property="id", type="array",
 *                      @OA\Items(type="string", example="The id field is required.")
 *                  ),
 *                  @OA\Property(property="title", type="array",
 *                      @OA\Items(type="string", example="The title field is required.")
 *                  ),
 *                  @OA\Property(property="url", type="array",
 *                      @OA\Items(type="string", example="The url field is required.")
 *                  ),
 *                  @OA\Property(property="thumbnailUrl", type="array",
 *                      @OA\Items(type="string", example="The thumbnail url field is required.")
 *                  )
 *              )
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=404,
 *          description="Resource not found or something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 *  ),
 *
 * @OA\Delete(
 *      path="/api/v1/photos/{id}",
 *      summary="Delete a specific photo",
 *      tags={"Photo"},
 *
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Photo's id",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="Photo deleted successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Deleted photo with id 1")
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=404,
 *          description="Photo not found or something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 *  )
 */


use App\Http\Controllers\Api\v1\Controller;

class PhotoController extends Controller
{
    //
}
