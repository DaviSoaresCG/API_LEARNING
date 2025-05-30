<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function status()
    {
        return response()->json(
            [
                'status' => 'ok',
                'message' => 'API is runnig OK!'
            ],
            200
        );
    }

    public function clients()
    {
        $clients = Client::paginate(10);
        return response()->json(
            [
                'status' => 'ok',
                'message' => 'success',
                'data' => $clients
            ]
        );
    }

    public function clientById($id)
    {
        $client = Client::find($id);

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'success',
                'data' => $client
            ],
            200
        );
    }

    public function client(Request $request)
    {
        if(!$request->id){
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'client ID is required'
                ],
                400
            );
        }

        $client = Client::find($request->id);

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'success',
                'data' => $client
            ],
            200
        );
    }

    public function addClient(Request $request)
    {
        //crate new client
        $client = new Client();
        $client->name = $request->name();
        $client->email = $request->email();
        $client->save();

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'success',
                'data' => $client
            ],
            200
        );
    }
}
