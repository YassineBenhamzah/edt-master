<?php

namespace App\Http\Controllers;

use App\Models\Caution;
use App\Http\Requests\StoreCautionRequest;
use App\Http\Requests\UpdateCautionRequest;
use App\Models\appeloffre;
use App\Models\Projet;

class CautionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("caution.index")->with([

            "cautions" => Caution::simplePaginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appeloffres = appeloffre::all();
        $projets = Projet::all();
        return view("caution.create")->with([
            "cautions" => Caution::all()
        ])->with( 'projets' , $projets)->with('appeloffres' , $appeloffres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCautionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCautionRequest $request)
    {
        $this->validate($request, [
            "montant" => "required",
            "typecaution" => "required",
            "datedebit" => "required|date|after_or_equal:today",
            "bqdebit" => "required",
            "refchq" => "required",
            "dateconstitution" =>  "required|date",
            "daterestitution" => "required|date|after:dateconstitution",
            "datecredit" => "required|date|after:datedebit",
            "bqcredit" => "required",
            "moycredit" => "required",
            "refcredit" => "required",
            "etat" => "required",

        ]);
        Caution::create([
            "montant" => $request->montant,
            "typecaution" => $request->typecaution,
            "datedebit" => $request->datedebit,
            "bqdebit" => $request->bqdebit,
            "refchq" => $request->refchq,
            "dateconstitution" => $request->dateconstitution,
            "daterestitution" => $request->daterestitution,
            "datecredit" => $request->datecredit,
            "bqcredit" => $request->bqcredit,
            "moycredit" => $request->moycredit,
            "refcredit" => $request->refcredit,
            "etat" => $request->etat,
            "appeloffres_id" => $request->appeloffres_id,
            "projet_id" => $request->projet_id,

        ]);
        return redirect()->route("cautions.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caution  $caution
     * @return \Illuminate\Http\Response
     */
    public function show(Caution $caution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caution  $caution
     * @return \Illuminate\Http\Response
     */
    public function edit(Caution $caution)
    {
        $projets = Projet::all();
        $appeloffres = appeloffre::all();
        return view("caution.edit")->with([
            "caution" => $caution
        ])->with( 'projets' , $projets)->with('appeloffres' , $appeloffres);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCautionRequest  $request
     * @param  \App\Models\Caution  $caution
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCautionRequest $request, Caution $caution)
    {
        $this->validate($request, [
            "appeloffres_id" => "required",
            "projet_id" => "required",
            "montant" => "required",
            "typecaution" => "required",
            "datedebit" => "required|date|after_or_equal:today",
            "bqdebit" => "required",
            "refchq" => "required",
            "dateconstitution" => "required|date|after:daterestitution",
            "daterestitution" => "required|date|",
            "datecredit" => "required|date|after:datedebit",
            "bqcredit" => "required",
            "moycredit" => "required",
            "refcredit" => "required",
            "etat" => "required",

        ]);
        $caution->update([
            "montant" => $request->montant,
            "appeloffres_id" => $request->appeloffres_id,
            "projet_id" => $request->projet_id,
            "typecaution" => $request->typecaution,
            "datedebit" => $request->datedebit,
            "bqdebit" => $request->bqdebit,
            "refchq" => $request->refchq,
            "dateconstitution" => $request->dateconstitution,
            "daterestitution" => $request->daterestitution,
            "datecredit" => $request->datecredit,
            "bqcredit" => $request->bqcredit,
            "moycredit" => $request->moycredit,
            "refcredit" => $request->refcredit,
            "etat" => $request->etat,

        ]);
        return redirect()->route("cautions.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caution  $caution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caution $caution)
    {
        $caution->delete();
        return redirect()->route("cautions.index");
    }
}
