<?php

use App\Http\Controllers\FacilityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route:: get ('/hello',function(){
    return "Hello ";
});

Route:: get ('/goodbye/{name}',function($name){
    return "Goodnye".$name;
});

Route:: post ('/info',function(Request $request){
    return "Hello" .$request ['name'] .'you are' .$request ['age'] .'years old';
});

Route:: post ('/places',[PlaceController :: class, 'store']);
Route:: get ('/places',[PlaceController :: class, 'index']);
Route:: get ('/places/{id}',[PlaceController :: class, 'show']);
Route:: put ('/places/{id}',[PlaceController :: class, 'update']);
Route:: delete ('/places/{id}',[PlaceController :: class, 'update']);

Route:: post ('/review',[ReviewController :: class, 'store']);
Route:: get ('/review',[ReviewController :: class, 'index']);
Route:: get ('/review/{id}',[ReviewController :: class, 'show']);
Route:: put ('/review/{id}',[ReviewController :: class, 'update']);
Route:: delete ('/review/{id}',[ReviewController :: class, 'update']);

Route:: post ('/facility',[FacilityController :: class, 'store']);
Route:: get ('/facility',[FacilityController :: class, 'index']);
Route:: get ('/facility/{id}',[FacilityController :: class, 'show']);
Route:: put ('/facility/{id}',[FacilityController :: class, 'update']);
Route:: delete ('/facility/{id}',[FacilityController :: class, 'update']);