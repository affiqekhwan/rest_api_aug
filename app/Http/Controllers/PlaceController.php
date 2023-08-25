<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    //
    
    public function store(Request $request){
        $place = new Place();
        $place ->name = $request->name;
        $place ->address = $request->address;
        $place ->discription = $request->discription;
        $place ->images_url = $request->images_url;
        $place ->Phone_No = $request->Phone_No;
        $place ->email = $request->email;

    


        if($place -> save()){
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
       // $places = Place::all();
       $places = Place::select('id','name','email','discription','address','images_url','Phone_No')->get();
        if ($places){
            return response()->json([
                "success"=>true,
                "data"=>$places
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
        $place = Place::with('reviews.user')->find($id);
        if ($place){
            return response()->json([
                "success"=>true,
                "data"=>$place
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

        $place = Place :: find($id);
        if ($place){
            $place = new Place();
            $place ->name = $request->name;
            $place ->address = $request->address;
            $place ->discription = $request->discription;
            $place ->images_url = $request->images_url;
            $place ->Phone_No = $request->Phone_No;
            $place ->email = $request->email;
         

            if ($place->save()){
                return response()->json([
                    "success"=>true,
                    "message"=>"Place Successfully updated",
                    "data"=>$place
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
        $place = Place::find($id);
        if ($place){
            if ($place->delete()){
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
