<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function transactions() {
        return $this->hasMany('App\Models\Transaction')
                ->orderBy('datetime','desc');
    }

    public function deposits() {
        return $this->hasMany('App\Models\Transaction')
                ->where('type','d')
                ->orderBy('datetime','desc');
    }

    public function withdrawals() {
        return $this->hasMany('App\Models\Transaction')
                ->where('type','w')
                ->orderBy('datetime','desc');
    }
}
