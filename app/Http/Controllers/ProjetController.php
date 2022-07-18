<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Projet;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjetRequest;
use App\Http\Requests\UpdateProjetRequest;


class ProjetController extends Controller
{
      public function SearchClientt(Request $request) {
        if($request->search == null || $request->searchTy == null || $request->searchetattech == null || $request->searchetatfin == null || $request->montant_ttc == null  ){
            $client = Client::where("nom",'LIKE' , '%' . $request->searchnom . '%')->first();
            $projets = $client->projets;
            return view("projet.search")->with("projets" , $projets);
           }

      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $projets = Projet::where([
            ['ref'  , '!=' , null],
            [function ($query) use ($request){
                if (($search = $request->search )){
                    $query->orWhere('ref' , 'LIKE' , '%' . $search . '%')->get();
                }
                if (($searchTy = $request->searchTy )){
                    $query->orWhere('type_projet' , 'LIKE' , '%' . $searchTy . '%')->get();
                }
                if (($searchetattech = $request->searchetattech )){
                    $query->orWhere('etattech' , 'LIKE' , '%' . $searchetattech . '%')->get();
                }
                if (($searchetatfin = $request->searchetatfin )){
                    $query->orWhere('etatfin' , 'LIKE' , '%' . $searchetatfin . '%')->get();
                }
                if (($searchmontant_ttc = $request->searchmontant_ttc )){
                    $query->orWhere('montant_ttc' , 'LIKE' , '%' . $searchmontant_ttc . '%')->get();
                }
                /* if($request->search == null || $request->searchTy == null || $request->searchetattech == null || $request->searchetatfin == null || $request->searchmontant_ttc == null){
                    $client = Client::where("nom",'LIKE' , '%' . $request->searchref . '%')->first();
                    $projets = $client->projets;
                    return view("projet.index")->with("projets" , $projets);
                 } */


            }]
        ])->orderBy('id' ,'DESC')->get();


        return view("projet.index")->with('projets' , $projets);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view("projet.create")->with([
            "projets" => Projet::all()
        ])->with('clients' , $clients);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjetRequest $request)
    {
        $this->validate($request, [
            "client_id" => "required",
            "objet" => "required",
            "montant_ht" => "required",
            "montant_ttc" => "required",
            "type_projet" => "required",
            "dateosc" => "required",
            "delai_execution" => "required",
            "etattech" => "required",
            "etatfin" => "required",
            "ref" => "required"
        ]);
        Projet::create([
            "client_id" => $request->client_id,
            "objet" => $request->objet,
            "montant_ht" => $request->montant_ht,
            "montant_ttc" => $request->montant_ttc,
            "type_projet" => $request->type_projet,
            "ref" => $request->ref,
            "dateosc" => $request->dateosc,
            "delai_execution" => $request->delai_execution,
            "etattech" => $request->etattech,
            "etatfin" => $request->etatfin,

        ]);
        return redirect()->route("projets.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        $clients = Client::all();
        return view("projet.edit")->with([
            "projet" => $projet
        ])->with('clients' , $clients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjetRequest  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjetRequest $request, Projet $projet)
    {
        $this->validate($request, [
            "client_id" => "required",
            "objet" => "required",
            "montant_ht" => "required",
            "montant_ttc" => "required",
            "type_projet" => "required",
            "dateosc" => "required",
            "delai_execution" => "required",
            "etattech" => "required",
            "etatfin" => "required",
            "ref" => "required",

        ]);

       $projet->update([
            "client_id" => $request->client_id,
            "objet" => $request->objet,
            "montant_ht" => $request->montant_ht,
            "montant_ttc" => $request->montant_ttc,
            "type_projet" => $request->type_projet,
            "dateosc" => $request->dateosc,
            "delai_execution" => $request->delai_execution,
            "etattech" => $request->etattech,
            "etatfin" => $request->etatfin,
            "ref" => $request->ref,
       ]);
       return redirect()->route("projets.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        $projet->delete();
        return redirect()->route("projets.index");
    }
    public function searchClient(Request $request){
        $request->validate([
            //"term"=>"required",
            //"startDate"=>"date",
            //"endDate"=>"date",
        ]);

           if($request->searchnom ){
            $client = Client::where("nom" , $request->searchnom)->first();
                     $projets = $client->projets;
                     return view("projet.index")->with('projets' , $projets);
           }
    }
}
