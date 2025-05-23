<?php

namespace App\Http\Controllers;


use App\Models\Client;
use Illuminate\Http\Request;

use Illuminate\Support\Str;



class ClientController extends Controller
{

    protected $client;

    public function __construct(Client $clients)
    {
        $this->client = $clients;
    }
    public function saveClient(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $imageExtension;
            $image->move(public_path('uploads/clients'), $imageName);
            $imagePath = $imageName;
        }

        $clientData = [
            'name' => $validated['name'],
            'image' => $imagePath,
        ];

        $client = Client::create($clientData);

        return response()->json([
            'status' => 'success',
            'message' => 'Client added successfully',
            'data' => $client,
        ], 200);
    }

    public function updateClient(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $client = Client::find($validated['id']);
        if (!$client) {
            return response()->json([
                'status' => false,
                'message' => 'Client not found',
            ], 404);
        }
        $imagePath = $client->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $imageExtension;
            $image->move(public_path('uploads/clients'), $imageName);
            $imagePath = $imageName;
        }


        $client->name = $validated['name'];
        $client->image = $imagePath;
        $client->updated_at = now();
        $client->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Client updated successfully',
            'data' =>  $client,
        ], 200);
    }

    public function getAllClient(Request $request)
    {

        $clients = Client::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Clients created successfully',
            'data' => $clients,
        ], 200);
    }

    public function deleteClient(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:clients,id',
        ]);


        $clientId = $request->input('id');
        $client = Client::find($clientId);

        if (!$client) {
            return response()->json([
                'status' => false,
                'message' => 'Client not found',
            ], 404);
        }


        $client->delete();

        return response()->json([
            'status' => true,
            'message' => 'Client  deleted successfully',
            'data' => $client,
        ], 200);
    }
}