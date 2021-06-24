<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json(
            [
                'status' => 'success',
                'users'  => $users->toArray(),
            ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function userRoles(): JsonResponse
    {
        $users = User::pluck('name', 'id');
        $roles = Role::pluck('name', 'id');

        return response()->json([
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function attachRole(Request $request): JsonResponse
    {
        $user = User::find($request->user);

        //check if role already attached
        if (!$user->roles->contains($request->role)) {
            $user->roles()->attach($request->role);
        }

        return response()->json('Role attached successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id): JsonResponse
    {
    }
}
