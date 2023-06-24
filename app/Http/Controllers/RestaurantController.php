<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      try {
        return Controller::response(200, true, Restaurant::with('menu')->get());
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
          "name" => 'required|string|min:1|max:255',
          "email" => 'required|email|min:1|max:255|unique:restaurants,email',
          "phone_number" => 'required|string|min:1|max:25|unique:restaurants,phone_number',
          "location" => 'required|string|min:1|max:255'
        ]);

        if ($validator->fails()) {
          return Controller::response(400, false, $validator->errors()->all());
        }

        $alias = strtolower(preg_replace('/\s+/', '_', $request->name));
        $request->merge(['alias' => $alias]);
        $store = Restaurant::create($request->all());
        return Controller::response(201, true, Restaurant::where('id', $store->id)->with('menu')->get());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
      try {
        return Controller::response(200, true, Restaurant::where('id', $restaurant->id)->with('menu')->first());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
      try {
        $validator = Validator::make($request->all(), [
          "name" => 'sometimes|required|string|min:1|max:65|unique:restaurants,name,' . $restaurant->id,
          "email" => 'sometimes|required|email|min:1|max:255|unique:restaurants,email,' . $restaurant->id,
          "phone_number" => 'sometimes|required|string|min:1|max:25|unique:restaurants,phone_number,' . $restaurant->id,
          "location" => 'required|string|min:1|max:255'
        ]);

        if ($validator->fails()) {
          return Controller::response(400, false, $validator->errors()->all());
        }

        $alias = strtolower(preg_replace('/\s+/', '_', $request->name));
        $request->merge(['alias' => $alias]);
        $update = $restaurant->update($request->all());
        return Controller::response(201, true, $restaurant::where('id', $restaurant->id)->with('menu')->get());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Restaurant $restaurant)
    {
      try {
        if (empty($restaurant)){
          return Controller::response(400, false, "Record Not Found~");
        }
        $restaurant->delete();
        return Controller::response(200, true, "Record Deleted Successfully!");
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }
}
