<?php

namespace App\Http\Controllers\Api\v1\Swagger;

use App\Http\Controllers\Api\v1\Controller;

/**
 * @OA\Get(
 *      path="/api/v1/users",
 *      summary="List of all users",
 *      tags={"User"},
 *
 *      @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="name", type="string", example="Leanne Graham"),
 *                  @OA\Property(property="username", type="string", example="Bret"),
 *                  @OA\Property(property="email", type="string", example="Sincere@april.biz"),
 *                  @OA\Property(property="address", type="object",
 *                      @OA\Property(property="street", type="string", example="Kulas Light"),
 *                      @OA\Property(property="suite", type="string", example="Apt. 556"),
 *                      @OA\Property(property="city", type="string", example="Gwenborough"),
 *                      @OA\Property(property="zipcode", type="string", example="92998-3874"),
 *                      @OA\Property(property="geo", type="object",
 *                          @OA\Property(property="lat", type="string", example="-37.3159"),
 *                          @OA\Property(property="lng", type="string", example="81.1496")
 *                      )
 *                  ),
 *                  @OA\Property(property="phone", type="string", example="1-770-736-8031 x56442"),
 *                  @OA\Property(property="website", type="string", example="hildegard.org"),
 *                  @OA\Property(property="company", type="object",
 *                      @OA\Property(property="name", type="string", example="Romaguera-Crona"),
 *                      @OA\Property(property="catchPhrase", type="string", example="Multi-layered client-server neural-net"),
 *                      @OA\Property(property="bs", type="string", example="harness real-time e-markets")
 *                  )
 *              )
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=404,
 *          description="Something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 *  ),
 *
 * @OA\Post(
 *      path="/api/v1/users",
 *      summary="Create a new user",
 *      tags={"User"},
 *
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="name", type="string", example="Leanne Graham"),
 *              @OA\Property(property="username", type="string", example="Bret"),
 *              @OA\Property(property="email", type="string", example="Sincere@april.biz"),
 *              @OA\Property(property="address", type="object",
 *                  @OA\Property(property="street", type="string", example="Kulas Light"),
 *                  @OA\Property(property="suite", type="string", example="Apt. 556"),
 *                  @OA\Property(property="city", type="string", example="Gwenborough"),
 *                  @OA\Property(property="zipcode", type="string", example="92998-3874"),
 *                  @OA\Property(property="geo", type="object",
 *                      @OA\Property(property="lat", type="string", example="-37.3159"),
 *                      @OA\Property(property="lng", type="string", example="81.1496")
 *                  )
 *              ),
 *              @OA\Property(property="phone", type="string", example="1-770-736-8031 x56442"),
 *              @OA\Property(property="website", type="string", example="hildegard.org"),
 *              @OA\Property(property="company", type="object",
 *                  @OA\Property(property="name", type="string", example="Romaguera-Crona"),
 *                  @OA\Property(property="catchPhrase", type="string", example="Multi-layered client-server neural-net"),
 *                  @OA\Property(property="bs", type="string", example="harness real-time e-markets")
 *              )
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=201,
 *          description="User created",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="id", type="integer", example=11),
 *              @OA\Property(property="name", type="string", example="Leanne Graham"),
 *              @OA\Property(property="username", type="string", example="Bret"),
 *              @OA\Property(property="email", type="string", example="Sincere@april.biz"),
 *              @OA\Property(property="address", type="object",
 *                  @OA\Property(property="street", type="string", example="Kulas Light"),
 *                  @OA\Property(property="suite", type="string", example="Apt. 556"),
 *                  @OA\Property(property="city", type="string", example="Gwenborough"),
 *                  @OA\Property(property="zipcode", type="string", example="92998-3874"),
 *                  @OA\Property(property="geo", type="object",
 *                      @OA\Property(property="lat", type="string", example="-37.3159"),
 *                      @OA\Property(property="lng", type="string", example="81.1496")
 *                  )
 *              ),
 *              @OA\Property(property="phone", type="string", example="1-770-736-8031 x56442"),
 *              @OA\Property(property="website", type="string", example="hildegard.org"),
 *              @OA\Property(property="company", type="object",
 *                  @OA\Property(property="name", type="string", example="Romaguera-Crona"),
 *                  @OA\Property(property="catchPhrase", type="string", example="Multi-layered client-server neural-net"),
 *                  @OA\Property(property="bs", type="string", example="harness real-time e-markets")
 *              )
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
 *                  @OA\Property(property="name", type="array",
 *                      @OA\Items(type="string", example="The name field is required.")
 *                  ),
 *                  @OA\Property(property="username", type="array",
 *                      @OA\Items(type="string", example="The username field is required.")
 *                  ),
 *                  @OA\Property(property="email", type="array",
 *                      @OA\Items(type="string", example="The email field is required.")
 *                  ),
 *                  @OA\Property(property="address", type="array",
 *                      @OA\Items(type="string", example="The address field is required.")
 *                  ),
 *                  @OA\Property(property="address.street", type="array",
 *                      @OA\Items(type="string", example="The address.street field is required.")
 *                  ),
 *                  @OA\Property(property="address.suite", type="array",
 *                      @OA\Items(type="string", example="The address.suite field is required.")
 *                  ),
 *                  @OA\Property(property="address.city", type="array",
 *                      @OA\Items(type="string", example="The address.city field is required.")
 *                  ),
 *                  @OA\Property(property="address.zipcode", type="array",
 *                      @OA\Items(type="string", example="The address.zipcode field is required.")
 *                  ),
 *                  @OA\Property(property="address.geo", type="array",
 *                      @OA\Items(type="string", example="The address.geo field is required.")
 *                  ),
 *                  @OA\Property(property="address.geo.lat", type="array",
 *                      @OA\Items(type="string", example="The address.geo.lat field is required.")
 *                  ),
 *                  @OA\Property(property="address.geo.lng", type="array",
 *                      @OA\Items(type="string", example="The address.geo.lng field is required.")
 *                  ),
 *                  @OA\Property(property="phone", type="array",
 *                      @OA\Items(type="string", example="The phone field is required.")
 *                  ),
 *                  @OA\Property(property="website", type="array",
 *                      @OA\Items(type="string", example="The website field is required.")
 *                  ),
 *                  @OA\Property(property="company", type="array",
 *                      @OA\Items(type="string", example="The company field is required.")
 *                  ),
 *                  @OA\Property(property="company.name", type="array",
 *                      @OA\Items(type="string", example="The company.name field is required.")
 *                  ),
 *                  @OA\Property(property="company.catchPhrase", type="array",
 *                      @OA\Items(type="string", example="The company.catch phrase field is required.")
 *                  ),
 *                  @OA\Property(property="company.bs", type="array",
 *                      @OA\Items(type="string", example="The company.bs field is required.")
 *                  )
 *              )
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=404,
 *          description="Something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 *  ),
 *
 * @OA\Get(
 *      path="/api/v1/users/{id}",
 *      summary="Show a specific user",
 *      tags={"User"},
 *
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="ID of the user",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="User fetched successfully",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="name", type="string", example="Leanne Graham"),
 *              @OA\Property(property="username", type="string", example="Bret"),
 *              @OA\Property(property="email", type="string", example="Sincere@april.biz"),
 *              @OA\Property(property="address", type="object",
 *                  @OA\Property(property="street", type="string", example="Kulas Light"),
 *                  @OA\Property(property="suite", type="string", example="Apt. 556"),
 *                  @OA\Property(property="city", type="string", example="Gwenborough"),
 *                  @OA\Property(property="zipcode", type="string", example="92998-3874"),
 *                  @OA\Property(property="geo", type="object",
 *                      @OA\Property(property="lat", type="string", example="-37.3159"),
 *                      @OA\Property(property="lng", type="string", example="81.1496")
 *                  )
 *              ),
 *              @OA\Property(property="phone", type="string", example="1-770-736-8031 x56442"),
 *              @OA\Property(property="website", type="string", example="hildegard.org"),
 *              @OA\Property(property="company", type="object",
 *                  @OA\Property(property="name", type="string", example="Romaguera-Crona"),
 *                  @OA\Property(property="catchPhrase", type="string", example="Multi-layered client-server neural-net"),
 *                  @OA\Property(property="bs", type="string", example="harness real-time e-markets")
 *              )
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=404,
 *          description="Something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 *  ),
 *
 * @OA\Put(
 *      path="/api/v1/users/{id}",
 *      summary="Update a specific user",
 *      tags={"User"},
 *
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="ID of the user to be updated",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="name", type="string", example="Leanne Graham"),
 *              @OA\Property(property="username", type="string", example="Bret"),
 *              @OA\Property(property="email", type="string", example="Sincere@april.biz"),
 *              @OA\Property(property="address", type="object",
 *                  @OA\Property(property="street", type="string", example="Kulas Light"),
 *                  @OA\Property(property="suite", type="string", example="Apt. 556"),
 *                  @OA\Property(property="city", type="string", example="Gwenborough"),
 *                  @OA\Property(property="zipcode", type="string", example="92998-3874"),
 *                  @OA\Property(property="geo", type="object",
 *                      @OA\Property(property="lat", type="string", example="-37.3159"),
 *                      @OA\Property(property="lng", type="string", example="81.1496")
 *                  )
 *              ),
 *              @OA\Property(property="phone", type="string", example="1-770-736-8031 x56442"),
 *              @OA\Property(property="website", type="string", example="hildegard.org"),
 *              @OA\Property(property="company", type="object",
 *                  @OA\Property(property="name", type="string", example="Romaguera-Crona"),
 *                  @OA\Property(property="catchPhrase", type="string", example="Multi-layered client-server neural-net"),
 *                  @OA\Property(property="bs", type="string", example="harness real-time e-markets")
 *              )
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="User updated successfully",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="name", type="string", example="Leanne Graham"),
 *              @OA\Property(property="username", type="string", example="Bret"),
 *              @OA\Property(property="email", type="string", example="Sincere@april.biz"),
 *              @OA\Property(property="address", type="object",
 *                  @OA\Property(property="street", type="string", example="Kulas Light"),
 *                  @OA\Property(property="suite", type="string", example="Apt. 556"),
 *                  @OA\Property(property="city", type="string", example="Gwenborough"),
 *                  @OA\Property(property="zipcode", type="string", example="92998-3874"),
 *                  @OA\Property(property="geo", type="object",
 *                      @OA\Property(property="lat", type="string", example="-37.3159"),
 *                      @OA\Property(property="lng", type="string", example="81.1496")
 *                  )
 *              ),
 *              @OA\Property(property="phone", type="string", example="1-770-736-8031 x56442"),
 *              @OA\Property(property="website", type="string", example="hildegard.org"),
 *              @OA\Property(property="company", type="object",
 *                  @OA\Property(property="name", type="string", example="Romaguera-Crona"),
 *                  @OA\Property(property="catchPhrase", type="string", example="Multi-layered client-server neural-net"),
 *                  @OA\Property(property="bs", type="string", example="harness real-time e-markets")
 *              )
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
 *                  @OA\Property(property="name", type="array",
 *                      @OA\Items(type="string", example="The name field is required.")
 *                  ),
 *                  @OA\Property(property="username", type="array",
 *                      @OA\Items(type="string", example="The username field is required.")
 *                  ),
 *                  @OA\Property(property="email", type="array",
 *                      @OA\Items(type="string", example="The email field must be a valid email address.")
 *                  ),
 *                  @OA\Property(property="address.street", type="array",
 *                      @OA\Items(type="string", example="The address.street field is required.")
 *                  ),
 *                  @OA\Property(property="address.geo.lat", type="array",
 *                      @OA\Items(type="string", example="The address.geo.lat field is required.")
 *                  ),
 *                  @OA\Property(property="phone", type="array",
 *                      @OA\Items(type="string", example="The phone field is required.")
 *                  ),
 *                  @OA\Property(property="website", type="array",
 *                      @OA\Items(type="string", example="The website field is required.")
 *                  ),
 *                  @OA\Property(property="company.name", type="array",
 *                      @OA\Items(type="string", example="The company.name field is required.")
 *                  ),
 *                  @OA\Property(property="company.catchPhrase", type="array",
 *                      @OA\Items(type="string", example="The company.catchPhrase field is required.")
 *                  ),
 *                  @OA\Property(property="company.bs", type="array",
 *                      @OA\Items(type="string", example="The company.bs field is required.")
 *                  )
 *              )
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=404,
 *          description="Something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 *  ),
 *
 * @OA\Delete(
 *      path="/api/v1/users/{id}",
 *      summary="Delete a specific user",
 *      tags={"User"},
 *
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="ID of the user to be deleted",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="User deleted successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Deleted user with id 1")
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=404,
 *          description="Something went wrong",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Something went wrong")
 *          )
 *      )
 *  )
 *
 *
 */

class UserController extends Controller
{
    //
}
