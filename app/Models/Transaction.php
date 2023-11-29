<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['account_id','type','datetime','source'];

    public function account() {
        return $this->belongsTo('App\Models\Account');
    }
}
