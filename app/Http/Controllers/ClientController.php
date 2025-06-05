<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success(Client::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the resquest
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required'
        ]);

        // add a new client 
        $client = Client::create($request->all());

        return ApiResponse::success($client);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // show client
        $client = Client::find($id);

        if ($client) {
            return ApiResponse::success($client);
        } else {
            return ApiResponse::error('Client Not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $id, //nao aceita emails repitidos, mas ignora caso seja igual ao proprio cliente que esta alterando(se ele alterar apenas o nome, o email ficara igual e entraria na validação do unique, mas caso o id seja igual ao do cliente, ou seja, se o proprio cliente estiver alterando os dados, a validação ignora o unique)
            'phone' => 'required'
        ]);

        // OUTRA FORMA DE FAZER, MAIS LEGIVEL
        // $request->validate([
        //     'name' => 'required',
        //     'email' => [
        //         'required',
        //         'email',
        //         // nao aceita emails repitidos, mas ignora o proprio email do usuario
        //         Rule::unique('clients')->ignore($id)
        //     ],
        //     'phone' => 'required'
        // ]);

        $client = Client::find($id);
        if ($client) {

            $client->update($request->all());
            return ApiResponse::success($client);
        } else {
            return ApiResponse::error("Client Not Found");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        if ($client) {
            $client->delete();
            return ApiResponse::success('Client deleted!');
        } else {
            return ApiResponse::error('Client NOT FOUND');
        }
    }
}
