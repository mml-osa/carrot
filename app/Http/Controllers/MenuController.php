<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      try {
        return Controller::response(200, true, Menu::with('restaurant')->get());
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
          "description" => 'required|string|min:1|max:255',
        ]);

        if ($validator->fails()) {
          return Controller::response(400, false, $validator->errors()->all());
        }

        $store = Menu::create($request->all());
        return Controller::response(201, true, Menu::where('id', $store->id)->with('menu')->get());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
      try {
        return Controller::response(200, true, Menu::where('id', $menu->id)->with('menu')->first());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
      try {
        $validator = Validator::make($request->all(), [
          "name" => 'sometimes|required|string|min:1|max:255',
          "description" => 'sometimes|required|string|min:1|max:255',
        ]);

        if ($validator->fails()) {
          return Controller::response(400, false, $validator->errors()->all());
        }

        $update = $menu->update($request->all());
        return Controller::response(201, true, $menu::where('id', $menu->id)->with('menu')->get());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
