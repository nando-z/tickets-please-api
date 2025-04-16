<?php

namespace App\Http\Controllers\Api\V1;
// use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->include("tickets")) {
            # code...
            return UserResource::collection(User::with('tickets')->paginate());

        }
        return UserResource::collection(User::paginate());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        # if request include => tickets..
        if ($this->include("tickets")) {
            # Show include Tickets..
            return new UserResource($user->load("tickets"));
        }
        # else don't show tickets...
        return new UserResource($user);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
