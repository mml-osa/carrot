<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_users = User::all();
        return Controller::response(200,true, User::with('profile')->with('role')->get());
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
    public function show(Role $userRole)
    {
        //
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
    public function update(Request $request, Role $userRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $userRole)
    {
        //
    }
}
