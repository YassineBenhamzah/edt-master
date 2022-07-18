<?php

namespace App\Http\Controllers;

use App\Models\phase;
use App\Http\Requests\StorephaseRequest;
use App\Http\Requests\UpdatephaseRequest;
use App\Models\Projet;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiIndex($id){
        $data['phasep'] = phase::where('projet_id' , $id)->get();
        $data['projet'] = Projet::find($id);
        return response()->json(['success' => true,'data' => $data, 'msg' => 'phase with success'], 200);
    }
    public function index()
    {
        /*$data['phasep'] = phase::where('projet_id' , $id)->get();
        return response()->json(['success' => true,'data' => $data, 'msg' => 'phase with success'], 200);*/
        return view("phase.index")->with([

            "phases" => phase::simplePaginate(4)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::all();
        return view("phase.create")->with([
            "phases" => phase::all()
        ])->with('projets' , $projets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorephaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorephaseRequest $request)
    {
        $this->validate($request, [
            "projet_id" => "required",
            "name" => "required",
            "nb_total_bugees" => "required",
            "start_date" => "required|date",
            "closing_date" => "required|after:start_date",
            "expclosing_date" => "required|after:start_date",

        ]);
        phase::create([
            "projet_id" => $request->projet_id,
            "name" => $request->name,
            "nb_total_bugees" => $request->nb_total_bugees,
            "start_date" => $request->start_date,
            "closing_date" =>$request->closing_date,
            "expclosing_date" => $request->expclosing_date,

        ]);
        return redirect()->route("phases.index")->with([
            "success" => "Contact add with success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function show(phase $phase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit(phase $phase)
    {
        return view("phase.edit")->with([
            "phase" => $phase
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatephaseRequest  $request
     * @param  \App\Models\phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatephaseRequest $request, phase $phase)
    {
        $this->validate($request, [
            //"projet_id" => "required",
            "name" => "required",
            "nb_total_bugees" => "required",
            "start_date" => "required",
            "closing_date" => "required|after:start_date",
            "expclosing_date" => "required|after:start_date",

        ]);
        $phase->update([
            //"projet_id" => $request->projet_id,
            "name" => $request->name,
            "nb_total_bugees" => $request->nb_total_bugees,
            "start_date" => $request->start_date,
            "closing_date" =>$request->closing_date,
            "expclosing_date" => $request->expclosing_date,

        ]);
        return redirect()->route("phases.index")->with([
            "success" => "Contact add with success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function destroy(phase $phase)
    {
        $phase->delete();
        return redirect()->route("phases.index");
    }
}
