<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\players;
use App\Http\Resources\playerResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Illuminate\Database\QueryException;

class playerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all players
        $players = players::with('team')->orderBy('first_name','asc')->get();
        
        return playerResource::collection($players);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Validate if request is provided
          $validator = Validator::make($request->all(), [
            'first_name'        => 'required',
            'last_name'         => 'required', 
            'age'               => 'numeric|required', 
            'height'            => 'numeric|required', 
            'debut_year'        => 'numeric',
            'position'          => 'required',
         ]);

        if ($validator->fails()) {
            return response()->json(['message'=> $validator->errors(), 'status' => 401]);            
        }

        $player = players::create($request->all());
        if($player){
            return new playerResource(players::find($player['id']));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get a players
        $player = players::with('team')->where(['id' => $id])->get();

        return new playerResource($player);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate if request is provided
        $validator = Validator::make($request->all(), [
            'age'               => 'numeric', 
            'height'            => 'numeric', 
            'debut_year'        => 'numeric',
        ]);


        if ($validator->fails()) {
            return response()->json(['message'=> $validator->errors(), 'status' => 401]);            
        }

        $player = players::where(['id' => $id])->update($request->all());
        if($player){
            return new playerResource(
                players::where(['id' => $id])->get()
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = players::where(['id' => $id])->update(['is_active','0']);
    }
}
