<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Place;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;


class ReviewController extends Controller
{
    //
    public function store(Request $request, $placeId){

        try{

            $place = Place:: find($placeId);
            $place["avg_rating"] = ($place["avg_rating"] * count($place["reviews"]) + $request->rating) /
            (count($place["reviews"])+1);

            $user = JWTAuth:: parseToken()->authenticate();
            $userId = $user->id
;        Review:: create([
            "rating"=>$request->rating,
            "user_id"=>$userId,
            "place_id"=>$placeId,
            "comment"=>$request->comment
        ]);

        $place->save();

        return response()->json(["success"=>true,
        "message"=>"Review successfully added"]);
    }
    catch (\Exception $e){
        return response()->json(['error' => 'Add review  failed ' . $e], 500);
    }
    }
}
