<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;


class FacilityController extends Controller
{
    //
    public function store(Request $request){
        $facility = new Facility();
        $facility ->name = $request->name;



        if($facility -> save()){
            return response()->json([
                "success"=>true,
                "message"=>"Place succesfully added"
            ]);
        }

        else{
            return response()->json([
                "success"=>false,
                "message"=>"Something Wrong"
            ]);
        }

    }
    public function index(){
        $facility = Facility::all();
        if ($facility){
            return response()->json([
                "success"=>true,
                "data"=>$facility
            ]);
        }

        else{
            return response()->json([
                "success"=>false,
                "data"=>"Something is Wrong"
            ]);
        }
        
    }
    public function show($id){
        $facility = Facility::find($id);
        if ($facility){
            return response()->json([
                "success"=>true,
                "data"=>$facility
            ]);
        }
        else{
            return response()->json([
                "success"=>false,
                "data"=>"Something Wrong"
            ]);
        }
    }
        
    
    public function update(Request $request, $id){

        $facility = Facility :: find($id);
        if ($facility){
            $facility = new Facility();
            $facility ->name = $request->name;


            if ($facility->save()){
                return response()->json([
                    "success"=>true,
                    "message"=>"Place Successfully updated",
                    "data"=>$facility
                ]);
            }

            else{
                return response()->json([
                    "successs"=>false,
                    "data"=>"Something Wrong"
                ]);
            }
        }

        
    }
    public function delete($id){
        $facility = Facility::find($id);
        if ($facility){
            if ($facility->delete()){
                return response()->json([
                    "success"=>true,
                    "message"=>"Place Success Delete"
                ]);
            }
            else{
                return response()->json([
                    "success"=>false,
                    "message"=>"Something Wrong"
                ]); 
            }
        }

        
    }

}
