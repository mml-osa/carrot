<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;
use OpenApi\Annotations as OA;

class UserController extends Controller
{

  /**
   * @OA\Get(
   *   path="/users",
   *   operationId="getProjectsList",
   *   tags={"Projects"},
   *   summary="Get list of users",
   *   description="Returns list of all users",
   *   parameters="/",
   *
   *   @OA\Response(
   *   response=200,
   *   description="Successful Operation",
   * ),
   *
   *   @OA\Response(
   *   response=400,
   *   description="Bad Request"
   * ),
   *
   *   @OA\Response(
   *   response=401,
   *   description="Unauthenticated",
   * ),
   *
   *   @OA\Response(
   *   response=403,
   *   description="Forbidden"
   * ),
   *
   *   @OA\Response(
   *   response=404,
   *   description="Not Found"
   * ),
   *
   *   @OA\Response(
   *   response=500,
   *   description="Internal Server Error"
   * ),
   *
   * )
   * @throws \HttpException
   */
  public function index()
  {
    try {
      return Controller::response(200, true, User::with('role')->get());
    } catch (\Exception $e) {
      throw new \HttpException('Error! ', $e->getMessage(), $e->getCode());
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function create(Request $request)
  {
    try {
      $validator = Validator::make($request->all(), [
        "username" => 'required|string|min:1|max:65|unique:users,username',
        "first_name" => 'required|string|min:1|max:65',
        "last_name" => 'required|string|min:1|max:255',
        "phone_number" => 'required|string|min:1|max:25|unique:users,phone_number',
        "email" => 'required|email|min:1|max:255|unique:users,email',
        "password" => 'required|string|min:1|max:225',
      ]);

      if ($validator->fails()) {
        return Controller::response(400, false, $validator->errors()->all());
      }

      $request->merge(['password' => Hash::make($request->password)]);
      $store = User::create($request->all());
      return Controller::response(201, true, User::where('id', $store->id)->with('role')->get());
    } catch (\Exception $e) {
      return Controller::response(400, false, $e->getMessage());
    }
  }

  /**
   * Display the specified resource.
   * @throws \HttpException
   */
  public function show(User $user)
  {
    try {
      return Controller::response(200, true, User::where('id', $user->id)->with('role')->first());
    } catch (\Exception $e) {
      throw new \HttpException('Error! ', $e->getMessage(), $e->getCode());
    }
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    try {
      $validator = Validator::make($request->all(), [
        "username" => 'sometimes|required|string|min:1|max:65|unique:users,username,' . $user->id,
        "first_name" => 'sometimes|required|string|min:1|max:65',
        "last_name" => 'sometimes|required|string|min:1|max:255',
        "phone_number" => 'sometimes|required|string|min:1|max:25|unique:users,phone_number,' . $user->id,
        "email" => 'sometimes|required|email|min:1|max:255|unique:users,email,' . $user->id,
        "password" => 'sometimes|required|string|min:1|max:225',
      ]);

      if ($validator->fails()) {
        return Controller::response(400, false, $validator->errors()->all());
      }
      $request->merge(['password' => Hash::make($request->password)]);
      $update = $user->update($request->all());
      return Controller::response(201, true, $user::where('id', $user->id)->with('role')->get());
    } catch (\Exception $e) {
      return Controller::response(400, false, $e->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function delete(User $user)
  {
    try {
      if (empty($user)){
        return Controller::response(400, false, "Record Not Found~");
      }
      $user->delete();
      return Controller::response(200, true, "Record Deleted Successfully!");
    } catch (\Exception $e) {
      return Controller::response(400, false, $e->getMessage());
    }
  }
}
