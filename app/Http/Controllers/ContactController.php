<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Client;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("contact.index")->with([

            "contacts" => Contact::simplePaginate(4)
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
        return view("contact.create")->with([
            "contacts" => Contact::all()
        ])->with('clients' , $clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $this->validate($request, [
            "nom" => "required",
            "prenom" => "required|min:5",
            "fonction" => "required",
            "telephone" => "required|numeric",
            "gsm" => "required|numeric",
            "mail" => "required",
            "client_id" => "required"
        ]);
        Contact::create([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "fonction" => $request->fonction,
            "telephone" => $request->telephone,
            "client_id" => $request->client_id,
            "gsm" => $request->gsm,
            "mail" => $request->mail
        ]);
        return redirect()->route("contacts.index")->with([
            "success" => "Contact add with success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $clients = Client::all();
        return view("contact.edit")->with([
            "contact" => $contact
        ])->with('clients' , $clients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $this->validate($request, [
            "nom" => "required|min:3",
            "prenom" => "required|min:5",
            "fonction" => "required",
            "telephone" => "required",
            "gsm" => "required",
            "mail" => "required",

        ]);

       $contact->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "fonction" => $request->fonction,
            "telephone" => $request->telephone,
            "gsm" => $request->gsm,
            "mail" => $request->mail,

       ]);
       return redirect()->route("contacts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route("contacts.index");
    }
}
