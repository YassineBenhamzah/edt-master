<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\task;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use App\Models\Client;
use App\Models\Projet;

//use illuminate\support\Facades\DB;
use \DB;

class TaskController extends Controller
{
    public function searchTask(Request $request){
        if($request->startDate == null || $request->endDate == null ){
            $client = Client::where("nom",'LIKE' , '%' . $request->searchref . '%')->first();
            $tasks = $client->tasks;
            return view("task.search")->with("tasks" , $tasks);
           }
           if($request->term == null){
            $task = task::where('datedebut','>=',$request->startDate)
            ->where('datedebut','<=',$request->endDate)
            ->get();
            return view("task.search")->with("tasks" , $task);
           }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$projets = DB::table('projets')->get();
        $clients = Client::all();
        $projets = Projet::all();
        return view("task.index")->with([

            "tasks" => task::simplePaginate(4)
        ])->with('projets' , $projets)->with('clients' , $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$projets = \DB::table('projets')->get();
        $clients = Client::all();
        $projets = Projet::all();
        return view("task.create")->with([
            "tasks" => task::all()
        ])->with('projets' , $projets)->with('clients' , $clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretaskRequest $request)
    {
        $this->validate($request, [
            "datedebut" => "required",
            "datefin" => "required",
            "nombre_heure" => "required",

        ]);
        task::create([
            "datedebut" => $request->datedebut,
            "datefin" => $request->datefin,
            "nombre_heure" => $request->nombre_heure,
            "client_id" => $request->client_id,
            "projet_id" => $request->projet_id,

        ]);
        return redirect()->route("tasks.index")->with([
            "success" => "Contact add with success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        $clients = Client::all();
        $projets = Projet::all();
        return view("task.edit")->with([
            "task" => $task
        ])->with('projets' , $projets)->with('clients' , $clients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetaskRequest  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetaskRequest $request, task $task)
    {
        $this->validate($request, [
            "datedebut" => "required",
            "datefin" => "required",
            "nombre_heure" => "required",

        ]);
        $task->update([
            "datedebut" => $request->datedebut,
            "datefin" => $request->datefin,
            "nombre_heure" => $request->nombre_heure,

        ]);
        return redirect()->route("tasks.index")->with([
            "success" => "Contact add with success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        $task->delete();
        return redirect()->route("tasks.index");
    }

    /*public function getclient($id){

        echo json_encode(DB::table('client_id')->where('projet_id' , $id)->get());
    }*/
    public function getproject($id){
        $data['client'] = Client::all();
        $data['projects'] = Projet::where('client_id',$id)->get();
        return response()->json(['data' => $data], 200);
    }
}
