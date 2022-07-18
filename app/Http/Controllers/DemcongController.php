<?php

namespace App\Http\Controllers;

use App\Models\demcong;
use Illuminate\Http\Request;
use App\Http\Requests\StoredemcongRequest;
use App\Http\Requests\UpdatedemcongRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DemcongController extends Controller
{
    public function SearchUser(Request $request){
        $request->validate([
            //"term"=>"required",
            //"startDate"=>"date",
            //"endDate"=>"date",
        ]);

           if($request->startDate == null || $request->endDate == null ){
            $users = User::where("name",'LIKE' , '%' . $request->term . '%')->get();
            foreach($users as $user){
                $conge = $user->demcongs;
            }
            return view("conge.s")->with("demcongs" , $conge);
           }
           if($request->term == null){
            $conge = demcong::where('datedebut','>=',$request->startDate)
            ->where('datedebut','<=',$request->endDate)
            ->get();
            return view("conge.s")->with("demcongs" , $conge);
           }

           /*if($request->term == null){
            //$user = User::where("name",$request->term)->first();
            //$conge = $user->demcongs;
            $startDate = \Carbon\Carbon::createFromFormat('Y-m-d',$request->startDate);
            $endDate = \Carbon\Carbon::createFromFormat('Y-m-d',$request->endDate);
            Carbon::createFromFormat('Y-m-d' , 'datedebut')->between($startDate,$endDate);

            return view("conge.s");

           }*/
           /*else{
            $user = User::where("name",$request->term)->first();
            $conge = $user->demcongs;
            $empty_array_data = array();
            $startDate = \Carbon\Carbon::createFromFormat('Y-m-d',$request->startDate);
            $endDate = \Carbon\Carbon::createFromFormat('Y-m-d',$request->endDate);
            //$check = \Carbon\Carbon()->between($startDate,$endDate);
            foreach ($conge  as $c ) {
                # code...
                if(Carbon::createFromFormat('Y-m-d',$c->datedebut)->between($startDate,$endDate)){
                    array_push($empty_array_data,$c);
                }
            }
            return view("conge.s")->with("demcongs",$empty_array_data);
           }

        //return $empty_array_data;*/



    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //serach user name in users table
        //get data related by models functions relationship

        if(Auth::user()->role_id == 1 ){

           $demcongs = demcong::orderBy('id' ,'DESC')->get();
            $demcongs = demcong::where([
                ['commenter' , '!=' , null],
                [function ($query) use ($request) {
                    if (($term = $request->term )) {
                        $query->orWhere('commenter' , 'LIKE' , '%' . $term . '%')->get();
                    }

                    if (($startDate = $request->startDate || $endDate = $request->endDate)){
                        $query->where('datedebut' , '>=' , $startDate)
                        ->where('datedebut' , '<=' , $endDate)
                        ->get();
                    }
                   /* if (($term = $request->term)){
                        demcong::whereHas('users', function($query) use($term) {
                            $query->where('name', 'like', '%' . $term . '%');
                        })->get();
                    }*/

                }]
            ])->orderBy('id' ,'DESC')->get();
        }
         /*  $user = User::where("name",$request->user_name)->get();
            foreach($user as $u){
                $u->demcongs;
            }
            return $user; */
        else{
            $demcongs = demcong::where('user_id' , Auth::user()->id)->get();
        }
        return view("conge.index")->with('demcongs' , $demcongs);

        /*-------search -----------*/

        /*if (request('term')) {
            $demcongs->where('commenter', 'Like', '%' . request('term') . '%')->get();
        }*/


        //return $demcongs->orderBy('id', 'DESC')->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view("conge.create")->with([
            "demcongs" => demcong::all()
        ])->with('users' , $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredemcongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredemcongRequest $request)
    {
        $this->validate($request, [
            "datedebut" => "required|date|after_or_equal:today",
            "commenter" => "required",
            "quantite_jour" =>  "required",
            "is_valide" => "required",
            "datefin" => "required|date|after:datedebut",
            "motifconge" => "required"


        ]);
        demcong::create([
            "user_id" => Auth::user()->id,
            "datedebut" => $request->datedebut,
            "commenter" => $request->commenter,
            "quantite_jour" => $request->quantite_jour,
            "is_valide" => $request->is_valide,
            "datefin" => $request->datefin,
            "motifconge" => $request->motifconge,

        ]);
        return redirect()->route("conges.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\demcong  $demcong
     * @return \Illuminate\Http\Response
     */
    public function show(demcong $demcong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\demcong  $demcong
     * @return \Illuminate\Http\Response
     */
    public function edit(demcong $demcong)
    {
        $users = User::all();
        return view("conge.edit")->with([
           "demcong" => $demcong
        ])->with('users' , $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedemcongRequest  $request
     * @param  \App\Models\demcong  $demcong
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedemcongRequest $request, demcong $demcong)
    {
        $this->validate($request, [

            "datedebut" => "required|date|after_or_equal:today",
            "commenter" => "required",
            "quantite_jour" =>  "required",
            "is_valide" => "required",
            "datefin" => "required|date|after:datedebut",
            "motifconge" => "required"


        ]);
        $demcong->update([
            "datedebut" => $request->datedebut,
            "commenter" => $request->commenter,
            "quantite_jour" => $request->quantite_jour,
            "is_valide" => $request->is_valide,
            "datefin" => $request->datefin,
            "motifconge" => $request->motifconge,


        ]);
        return redirect()->route("conges.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\demcong  $demcong
     * @return \Illuminate\Http\Response
     */
    public function destroy(demcong $demcong )
    {

        $demcong->delete();
        return redirect()->route("conges.index");
    }

    public function search(StoredemcongRequest $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $posts = demcong::query()
            ->where('commenter', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('search', compact('posts'));
    }
}
