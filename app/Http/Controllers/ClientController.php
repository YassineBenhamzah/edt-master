<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("client.index")->with([

            "clients" => Client::simplePaginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("client.create")->with([

            "clients" => Client::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $this->validate($request, [
            "nom" => "required|min:3",
            "abreviation" => "required",
            "ville" => "required",

        ]);
        Client::create([
            "nom" => $request->nom,
            "abreviation" => $request->abreviation,
            "ville" => $request->ville,

        ]);
        return redirect()->route("clients.index")->with([
            "success" => "Contact add with success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view("client.edit")->with([
            "client" => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $this->validate($request, [
            "nom" => "required|min:3",
            "abreviation" => "required",
            "ville" => "required",

        ]);

       $client->update([
            "nom" => $request->nom,
            "abreviation" => $request->abreviation,
            "ville" => $request->ville,

       ]);
       return redirect()->route("clients.index");
       /*$data = $request->validated();
       $client->fill($data);
       $client->save();
       return redirect()->route("clients.index");*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client )
    {

        $client->delete();
        return redirect()->route("clients.index")->with([
            "success" => "Client successfully Deleted"
        ]);

    }
}
