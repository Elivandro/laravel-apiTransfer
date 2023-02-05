<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\StoreUsersRequest;
use App\Http\Requests\api\UpdateUsersRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

use App\Models\api\ {
    Address,
    Phone,
    User,
    Wallet
};

class UserController extends Controller
{
    protected $user;
    protected $address;
    protected $phone;
    protected $wallet;

    public function __construct(User $user, Address $address, Phone $phone, Wallet $wallet)
    {
        $this->user = $user;
        $this->address = $address;
        $this->phone = $phone;
        $this->wallet = $wallet;
    }

    public function show($id)
    {
        return $this->user->with('address', 'phones', 'wallet')->findOrFail($id)->toJson();
    }
}
