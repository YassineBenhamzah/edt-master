<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use App\Http\Requests\StorePersonelRequest;
use App\Http\Requests\UpdatePersonelRequest;

class PersonelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("personel.index")->with([

            "personels" => Personel::simplePaginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("personel.create")->with([

            "personels" => Personel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonelRequest $request)
    {
         $this->validate($request, [
            "nom" => "required|min:3",
            "prenom" => "required|min:3",
            "mail" => "required",
            "telephone" => "required",
            "cine" => "required",

        ]);
        Personel::create([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "mail" => $request->mail,
            "telephone" => $request->telephone,
            "cine" => $request->cine,

        ]);
        $details = [
            'title' => 'Mail from edtrust.com',
            'body' => 'This is for testing email using smtp'
        ];

        \Mail::to($request->mail)->send(new \App\Mail\MyTestMail($details));


        return redirect()->route("personels.index")->with([
            "success" => "Contact add with success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function show(Personel $personel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personel $personel)
    {
        return view("personel.edit")->with([
            "personel" => $personel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonelRequest  $request
     * @param  \App\Models\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonelRequest $request, Personel $personel)
    {
        $this->validate($request, [
            "nom" => "required|min:3",
            "prenom" => "required|min:3",
            "mail" => "required",
            "telephone" => "required",
            "cine" => "required",

        ]);
        $personel->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "mail" => $request->mail,
            "telephone" => $request->telephone,
            "cine" => $request->cine,

        ]);
        return redirect()->route("personels.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personel $personel)
    {
        $personel->delete();
        return redirect()->route("personels.index");
    }
}
