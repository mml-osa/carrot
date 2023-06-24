<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      try {
        return Controller::response(200, true, MenuItem::with('menu')->get());
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
          "menu_item_category_id" => 'required|uuid',
          "name" => 'required|string|min:1|max:255',
          "menu_item_price" => 'required|integer',
          "menu_item_size_id" => 'required|uuid',
        ]);

        if ($validator->fails()) {
          return Controller::response(400, false, $validator->errors()->all());
        }

        $store = MenuItem::create($request->all());
        return Controller::response(201, true, MenuItem::where('id', $store->id)->with('menu')->get());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem $menuItem)
    {
      try {
        return Controller::response(200, true, MenuItem::where('id', $menuItem->id)->with('menu')->first());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
      try {
        $validator = Validator::make($request->all(), [
          "menu_item_category_id" => 'sometimes|required|uuid',
          "name" => 'sometimes|required|string|min:1|max:255',
          "menu_item_price" => 'sometimes|required|integer',
          "menu_item_size_id" => 'sometimes|required|uuid',
        ]);

        if ($validator->fails()) {
          return Controller::response(400, false, $validator->errors()->all());
        }

        $update = $menuItem->update($request->all());
        return Controller::response(201, true, $menuItem::where('id', $menuItem->id)->with('menu')->get());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        //
    }
}
