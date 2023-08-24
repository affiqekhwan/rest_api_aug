<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Place;
use App\Models\User;


class ReviewController extends Controller
{
    //
    public function store(Request $request){
        $review = new Review();
        $review ->rating = $request->rating;
        $review ->comment = $request->review;
        $review ->user_id = User::find($request->user_id)->id;
        $review ->place_id = Place::find($request->place_id)->id;


        if($review -> save()){
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
        $review = Review::all();
        if ($review){
            return response()->json([
                "success"=>true,
                "data"=>$review
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
        $review = Review::find($id);
        if ($review){
            return response()->json([
                "success"=>true,
                "data"=>$review
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

        $review = Review :: find($id);
        if ($review){
            $review = new Review();
            $review ->rating = $request->rating;
            $review ->review = $request->review;
            $review ->user_id = User::find($request->user_id)->id;
            $review ->place_id = Place::find($request->place_id)->id;

            if ($review->save()){
                return response()->json([
                    "success"=>true,
                    "message"=>"Place Successfully updated",
                    "data"=>$review
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
        $review = Review::find($id);
        if ($review){
            if ($review->delete()){
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
