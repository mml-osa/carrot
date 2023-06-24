<?php

namespace App\Http\Controllers;

use App\Models\MenuItemSize;
use Illuminate\Http\Request;

class MenuItemSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      try {
        return Controller::response(200, true, MenuItemSize::with('items')->get());
      } catch (\Exception $e) {
        return Controller::response(400, false, $e->getMessage());
      }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItemSize $menuItemSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItemSize $menuItemSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItemSize $menuItemSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItemSize $menuItemSize)
    {
        //
    }
}
