<?php

namespace App\Http\Controllers\Api\v1\Swagger;

use App\Http\Controllers\Api\v1\Controller;

/**
 * @OA\Get(
 *     path="/api/v1/todos",
 *     summary="List of all todos",
 *     tags={"Todo"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="List of all todos",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="userId", type="integer", example=1),
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Sample Todo"),
 *                 @OA\Property(property="completed", type="boolean", example=true)
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Something went wrong",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         )
 *     )
 * ),
 *
 * @OA\Post(
 *     path="/api/v1/todos",
 *     summary="Create a new todo",
 *     tags={"Todo"},
 *
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="userId", type="integer", example=1),
 *             @OA\Property(property="id", type="integer", example=201),
 *             @OA\Property(property="title", type="string", example="New Todo"),
 *             @OA\Property(property="completed", type="boolean", example=false)
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Todo created successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="userId", type="integer", example=1),
 *             @OA\Property(property="id", type="integer", example=201),
 *             @OA\Property(property="title", type="string", example="New Todo"),
 *             @OA\Property(property="completed", type="boolean", example=false)
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response=422,
 *          description="Validation error(s)",
 *          @OA\JsonContent(
 *              @OA\Property(property="status", type="string", example="error"),
 *              @OA\Property(property="status code", type="integer", example=422),
 *              @OA\Property(property="Validation error(s)", type="object",
 *                  @OA\Property(property="userId", type="array",
 *                      @OA\Items(type="string", example="The user id field is required.")
 *                  ),
 *                  @OA\Property(property="id", type="array",
 *                      @OA\Items(type="string", example="The id field is required.")
 *                  ),
 *                  @OA\Property(property="title", type="array",
 *                      @OA\Items(type="string", example="The title field is required.")
 *                  ),
 *                  @OA\Property(property="completed", type="array",
 *                      @OA\Items(type="string", example="The completed field is required.")
 *                  )
 *              )
 *          )
 *      ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Something went wrong",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         )
 *     )
 * ),
 *
 * @OA\Get(
 *     path="/api/v1/todos/{id}",
 *     summary="Show a specific todo",
 *     tags={"Todo"},
 *
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Todo's id",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Todo found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="userId", type="integer", example=1),
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Sample Todo"),
 *             @OA\Property(property="completed", type="boolean", example=true)
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Todo not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Todo not found")
 *         )
 *     )
 * ),
 *
 * @OA\Put(
 *     path="/api/v1/todos/{id}",
 *     summary="Update a specific todo",
 *     tags={"Todo"},
 *
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Todo's id",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="userId", type="integer", example=1),
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Updated Todo"),
 *             @OA\Property(property="completed", type="boolean", example=true)
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Todo updated",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="userId", type="integer", example=1),
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Updated Todo"),
 *             @OA\Property(property="completed", type="boolean", example=true)
 *         )
 *     ),
 *
 *     @OA\Response(
 *           response=422,
 *           description="Validation error(s)",
 *           @OA\JsonContent(
 *               @OA\Property(property="status", type="string", example="error"),
 *               @OA\Property(property="status code", type="integer", example=422),
 *               @OA\Property(property="Validation error(s)", type="object",
 *                   @OA\Property(property="userId", type="array",
 *                       @OA\Items(type="string", example="The user id field is required.")
 *                   ),
 *                   @OA\Property(property="id", type="array",
 *                       @OA\Items(type="string", example="The id field is required.")
 *                   ),
 *                   @OA\Property(property="title", type="array",
 *                       @OA\Items(type="string", example="The title field is required.")
 *                   ),
 *                   @OA\Property(property="completed", type="array",
 *                       @OA\Items(type="string", example="The completed field is required.")
 *                   )
 *               )
 *           )
 *       ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Something went wrong",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         )
 *     )
 * ),
 *
 * @OA\Delete(
 *     path="/api/v1/todos/{id}",
 *     summary="Delete a specific todo",
 *     tags={"Todo"},
 *
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="The ID of the todo to delete",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Todo deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Deleted todo with id 1")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Something went wrong",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Something went wrong")
 *         )
 *     )
 * )
 */


class TodoController extends Controller
{
    //
}
