<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LoyaltyPointTransaction extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id' => 'integer',
        'credit' => 'float',
        'debit' => 'float',
        'balance'=>'float',
        'reference'=>'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
