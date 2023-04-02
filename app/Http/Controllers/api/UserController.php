<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\api\User;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show($id)
    {
        return response()->json($this->user->with('address', 'phones', 'wallet', 'transfers')->findOrFail($id));
    }
}
