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

    public function store(Request $request) {
        $fields = $request->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'birth_date' => 'required|date',
        ]);

        $client = Client::create($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'A new client record has been created with an ID# of ' . $client->id
        ]);

    }

    public function update(Request $request, Client $client) {
        $fields = $request->validate([
            'last_name' => 'string',
            'first_name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'birth_date' => 'date'
        ]);

        $client->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Client with ID# ' . $client->id . ' has been updated.'
        ]);
    }

    public function destroy(Client $client) {
        $details = $client->last_name . ", " . $client->first_name;
        $client->delete();

        return response()->json([
            'status' => 'OK',
            'message' => "The client $details has been deleted."
        ]);
    }
}
