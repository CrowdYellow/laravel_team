<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return $this->response->array(['test_message' => 'store verification code']);
    }
}
