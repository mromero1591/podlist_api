<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public  function find($id) {
        return User::find($id);
    }

    public function list() {
        return User::paginate();
    }

    public function create(UserCreateRequest $request) {
        $user = User::create( $request->only('first_name', 'last_name', 'email') + [
            'password' => Hash::make('secretPass')
        ]);
        return response($user, Response::HTTP_CREATED);
    }

    public function update(UserUpdateRequest $request, $id) {
        $user = User::find($id);
        $user->update($request->only('first_name', 'last_name', 'email'));

        return response($user, Response::HTTP_ACCEPTED);
    }

    public function delete($id) {
        User::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function user()
    {
        $user = Auth::user();

        return (new UserResource($user))->additional([
            'data' => [
                'permissions' => $user,
            ],
        ]);
    }
}
