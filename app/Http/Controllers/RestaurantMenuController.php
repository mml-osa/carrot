<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      try {
        return Controller::response(200, true, RestaurantMenu::with('restaurant')->get());
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
          "restaurant_id" => 'required|uuid',
          "menu_item_category_id" => 'required|uuid',
        ]);

        if ($validator->fails()) {
          return Controller::response(400, false, $validator->errors()->all());
        }

        $store = RestaurantMenu::create($request->all());
        return Controller::response(201, true, RestaurantMenu::where('id', $store->id)->with('menu')->get());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(RestaurantMenu $restaurantMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RestaurantMenu $restaurantMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RestaurantMenu $restaurantMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RestaurantMenu $restaurantMenu)
    {
        //
    }
}
