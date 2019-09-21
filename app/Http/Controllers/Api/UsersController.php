<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return $this->response->created();
    }

    public function tokenResponse()
    {
        //
    }

    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }
}
