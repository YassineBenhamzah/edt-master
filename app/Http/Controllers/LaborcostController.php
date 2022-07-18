<?php

namespace App\Http\Controllers;

use App\Models\laborcost;
use App\Http\Requests\StorelaborcostRequest;
use App\Http\Requests\UpdatelaborcostRequest;
use App\Models\Personel;
use App\Models\User;
use Carbon\Carbon;

class LaborcostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("laborcost.index")->with([

            "laborcosts" => laborcost::simplePaginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view("laborcost.create")->with([
            "users" => User::all()
        ])->with('users' , $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelaborcostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelaborcostRequest $request)
    {
        $this->validate($request, [
            "user_id" => "required",
            "startingdate" => "required",
            "finaldate" => "required|after:startingdate",
            "cost" => "required",
            "isarchived" => "required",

        ]);
        $lastlaborcost = laborcost::where('user_id' ,  '=' , $request->user_id)->orderBy('id' , 'desc')->first();
        if($lastlaborcost){
 //return $lastlaborcost;
 $lastlaborcost_date = Carbon::createFromFormat('Y-m-d', $lastlaborcost->finaldate);
 $lastlaborcost_request_date = Carbon::createFromFormat('Y-m-d', $request->startingdate);

 $result = $lastlaborcost_request_date->gte($lastlaborcost_date); //gt
 if($result){
     laborcost::create([
         "user_id" => $request->user_id,
         "startingdate" => $request->startingdate,
         "finaldate" => $request->finaldate,
         "cost" => $request->cost,
         "isarchived" => $request->isarchived,


     ]);
     return redirect()->route("laborcosts.index")->with([
         "success" => "Laborcosts add with success"
     ]);


 }else {
         return redirect()->back()->with("error","The date has already been"." ".$lastlaborcost->finaldate);
 }
        }else{
            laborcost::create([
                "user_id" => $request->user_id,
                "startingdate" => $request->startingdate,
                "finaldate" => $request->finaldate,
                "cost" => $request->cost,
                "isarchived" => $request->isarchived,


            ]);
            return redirect()->route("laborcosts.index")->with([
                "success" => "Laborcosts add with success"
            ]);
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laborcost  $laborcost
     * @return \Illuminate\Http\Response
     */
    public function show(laborcost $laborcost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laborcost  $laborcost
     * @return \Illuminate\Http\Response
     */
    public function edit(laborcost $laborcost)
    {
        $users = User::all();
        return view("laborcost.edit")->with([
            "laborcost" => $laborcost
        ])->with('users' , $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelaborcostRequest  $request
     * @param  \App\Models\laborcost  $laborcost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelaborcostRequest $request, laborcost $laborcost)
    {
        $this->validate($request, [
            "startingdate" => "required|date|unique",
            "finaldate" => "required|date|unique",
            "cost" => "required",
            "isarchived" => "required",

        ]);
        $laborcost->update([
            "startingdate" => $request->startingdate,
            "finaldate" => $request->finaldate,
            "cost" => $request->cost,
            "isarchived" => $request->isarchived,


        ]);
        return redirect()->route("laborcosts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laborcost  $laborcost
     * @return \Illuminate\Http\Response
     */
    public function destroy(laborcost $laborcost)
    {
        $laborcost->delete();
        return redirect()->route("laborcosts.index");
    }
}
