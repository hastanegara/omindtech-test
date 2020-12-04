<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Repositories\Contracts\ClientInterface;

class ClientController extends Controller
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;

        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->client->all();

        return response([
            'status' => 200,
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $client = $this->client->store($request);

        if ( ! $client) {
            return response([
                'status' => 401,
                'message' => 'Client can not be created'
            ]);
        }

        return response([
            'status' => 200,
            'client' => $client
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = $this->client->getById($id);

        if ( ! $client) {
            return response([
                'status' => 401,
                'message' => 'Client can not be found'
            ]);
        }

        return response([
            'status' => 200,
            'client' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $client = $this->client->getById($id);

        if ( ! $client) {
            return response([
                'status' => 401,
                'message' => 'Client can not be found'
            ]);
        }

        $client = $this->client->update($id, $request);

        if ( ! $client) {
            return response([
                'status' => 401,
                'message' => 'Client can not be updated'
            ]);
        }

        return response([
            'status' => 200,
            'client' => $client
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = $this->client->getById($id);

        if ( ! $client) {
            return response([
                'status' => 401,
                'message' => 'Client can not be found'
            ]);
        }

        $this->client->destroy($id);

        return response([
            'status' => 200,
            'client' => $client
        ]);
    }
}
