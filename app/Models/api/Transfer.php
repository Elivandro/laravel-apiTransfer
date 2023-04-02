<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'to_id',
        'amount_brl',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function concludedTransfersBRL($data)
    {
        $fromOldBalance = Wallet::where('user_id', $data['id'])->first()->balance_brl;
        $toOldBalance = Wallet::where('user_id', $data['to_id'])->first()->balance_brl;

        if(!Hash::check($data['password'], User::where('id', $data['id'])->first()->password)){
            
            return response()->json([
                'type' => 'error',
                'message' => 'Senha para confirmar transação incorreta.'
            ]);

        }elseif($fromOldBalance < $data['amount_brl']){

            return response()->json([
                'type' => 'error',
                'message' => 'Saldo insuficiente para transferencia.'

            ]);

        }else{

            Wallet::where('user_id', $data['id'])->update([
                'balance_brl' => $fromOldBalance - $data['amount_brl']
            ]);
    
            Wallet::where('user_id', $data['to_id'])->update([
                'balance_brl' => $toOldBalance + $data['amount_brl']
            ]);
    
            Transfer::create([
                'user_id' => $data['id'],
                'to_id' => $data['to_id'],
                'amount_brl' => $data['amount_brl']
            ]);
    
            return response()->json([
                'type' => 'success',
                'message' => 'Transferência feita com sucesso!'
            ]);
        }
    }
}
