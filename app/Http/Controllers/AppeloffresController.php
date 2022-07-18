<?php

namespace App\Http\Controllers;

use App\Models\Appeloffres;
use App\Models\appeloffre;
use App\Http\Requests\StoreAppeloffresRequest;
use App\Http\Requests\UpdateAppeloffresRequest;

class AppeloffresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("appeloffre.index")->with([

            "appeloffres" => Appeloffres::simplePaginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("appeloffre.create")->with([
            "appeloffres" => Appeloffres::all()
        ]);
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
            "objet" => "required",
            "date_ouv" => "required",
            "typesoumission" => "required",

        ]);
        Appeloffres::create([
            "objet" => $request->objet,
            "date_ouv" => $request->date_ouv,
            "typesoumission" => $request->typesoumission,
            "client_id" => 2,

        ]);
        return redirect()->route("appeloffre.index")->with([
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
    public function edit(Appeloffres $appeloffres)
    {
        return view("appeloffre.edit")->with([
            "appeloffres" => $appeloffres
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppeloffresRequest  $request
     * @param  \App\Models\Appeloffres  $appeloffres
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppeloffresRequest $request, Appeloffres $appeloffres)
    {
        $this->validate($request, [
            "objet" => "required",
            "date_ouv" => "required",
            "typesoumission" => "required",


        ]);

       $appeloffres->update([
            "objet" => $request->objet,
            "date_ouv" => $request->date_ouv,
            "typesoumission" => $request->typesoumission,


       ]);
       return redirect()->route("appeloffre.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appeloffres  $appeloffres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appeloffres $appeloffres)
    {
        $appeloffres->delete();
        return redirect()->route("appeloffres.index");
    }
}
