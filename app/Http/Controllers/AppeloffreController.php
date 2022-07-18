<?php

namespace App\Http\Controllers;

use App\Models\Appeloffres;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAppeloffresRequest;
use App\Http\Requests\UpdateAppeloffresRequest;
use App\Models\appeloffre;
use App\Models\Client;

class AppeloffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("appeloffre.index")->with([

            "appeloffres" => appeloffre::simplePaginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view("appeloffre.create")->with([
            "appeloffres" => appeloffre::all()
        ])->with('clients' , $clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppeloffresRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppeloffresRequest $request)
    {
        $this->validate($request, [
            "client_id" => "required",
            "objet" => "required",
            "date_ouv" => "required",
            "typesoumission" => "required",
            "ref" => "required",

        ]);
        Appeloffres::create([
            "objet" => $request->objet,
            "date_ouv" => $request->date_ouv,
            "typesoumission" => $request->typesoumission,
            "client_id" => $request->client_id,
            "ref" => $request->ref

        ]);
        return redirect()->route("appeloffres.index")->with([
            "success" => "Contact add with success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appeloffres  $appeloffres
     * @return \Illuminate\Http\Response
     */
    public function show(Appeloffres $appeloffres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appeloffres  $appeloffres
     * @return \Illuminate\Http\Response
     */
    public function edit(Appeloffres $appeloffre)
    {
        $clients = Client::all();
        return view("appeloffre.edit")->with([
            "appeloffres" => $appeloffre
        ])->with('clients' , $clients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppeloffresRequest  $request
     * @param  \App\Models\Appeloffres  $appeloffres
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppeloffresRequest $request, Appeloffre $appeloffre)
    {
        $this->validate($request, [
            "objet" => "required",
            "date_ouv" => "required",
            "typesoumission" => "required",
            "client_id" => "required",
            "ref" => "required",


        ]);

       $appeloffre->update([
            "objet" => $request->objet,
            "date_ouv" => $request->date_ouv,
            "typesoumission" => $request->typesoumission,
            "client_id" =>$request->client_id,
            "ref" => $request->ref


       ]);
       return redirect()->route("appeloffres.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appeloffres  $appeloffres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appeloffre $appeloffre)
    {
        $appeloffre->delete();
        return redirect()->route("appeloffres.index");
    }
}
