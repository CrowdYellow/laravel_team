<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        return $this->response->array(['test_message' => 'store verification code']);
    }

    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }
}
