<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\api\Transfer;
use App\Models\api\User;

class TransferController extends Controller
{

    protected $users;
    protected $transfers;

    public function __construct(User $users, Transfer $transfers)
    {
        $this->users = $users;
        $this->transfers = $transfers;
    }
    
    public function show($id)
    {
        $user = $this->users->findOrFail($id);
        
        $transferToUser = $this->transfers->where('user_id', $user->id)->get();
        $receivedFromUser = $this->transfers->where('to_id', $user->id)->get();

        return response()->json([
            'user' => $user,
            'transferTo' => $transferToUser,
            'receivedFrom' => $receivedFromUser
        ]);
    }
}
