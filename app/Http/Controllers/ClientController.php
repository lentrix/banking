<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::orderBy('last_name')
                ->orderBy('first_name')->get();

        return response()->json($clients);
    }

    public function view(Client $client) {
        $client->load('accounts');
        return response()->json($client);
    }
}
