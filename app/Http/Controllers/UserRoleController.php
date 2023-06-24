<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    try {
      return Controller::response(200, true, Role::with('user')->get());
    } catch (\Exception $e) {
      return Controller::response(400, false, $e->getMessage());
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function create(Request $request)
  {
    try {
      $validator = Validator::make($request->all(), [
        "name" => 'required|string|min:1|max:65|unique:roles,name',
        "description" => 'required|string|min:1|max:255',
      ]);

      if ($validator->fails()) {
        return Controller::response(400, false, $validator->errors()->all());
      }

      $alias = strtolower(preg_replace('/\s+/', '_', $request->name));
      $request->merge(['alias' => $alias]);
      $store = Role::create($request->all());
      return Controller::response(201, true, Role::where('id', $store->id)->with('user')->get());
    } catch (\Exception $e) {
      return Controller::response(400, false, $e->getMessage());
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Role $role)
  {
    try {
      return Controller::response(200, true, Role::where('id', $role->id)->with('user')->first());
    } catch (\Exception $e) {
      return Controller::response(400, false, $e->getMessage());
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $userRole)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Role $role)
  {
    try {
      $validator = Validator::make($request->all(), [
        "name" => 'sometimes|required|string|min:1|max:65|unique:roles,name,' . $role->id,
        "description" => 'sometimes|required|string|min:1|max:65',
      ]);

      if ($validator->fails()) {
        return Controller::response(400, false, $validator->errors()->all());
      }

      $alias = strtolower(preg_replace('/\s+/', '_', $request->name));
      $request->merge(['alias' => $alias]);
      $update = $role->update($request->all());
      return Controller::response(201, true, $role::where('id', $role->id)->with('user')->get());
    } catch (\Exception $e) {
      return Controller::response(400, false, $e->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function delete(Role $role)
  {
    try {
      if (empty($role)) {
        return Controller::response(400, false, "Record Not Found~");
      }
      $role->delete();
      return Controller::response(200, true, "Record Deleted Successfully!");
    } catch (\Exception $e) {
      return Controller::response(400, false, $e->getMessage());
    }
  }
}
