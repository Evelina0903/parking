<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(Users::with('address')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $created_user = Users::create($request->validated());
        return new UserResource($created_user);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new UserResource(Users::with('address')->findOrFail($id));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserStoreRequest $request, Users $user)
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $user)
    {
        $user->delete();
        return response()->json(['message' => 'Запись успешно удалена'], Response::HTTP_OK);
    }
}
