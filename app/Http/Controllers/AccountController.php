<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index() {
        $accounts = Account::orderBy('created_at','DESC')->get();

        return response()->json($accounts);
    }

    public function view(Account $account) {
        $account->load('client');
        return response()->json($account);
    }
}
