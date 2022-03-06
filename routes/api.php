<?php

use Illuminate\Http\Request;
use App\Models\Utente;
use App\Models\Raccolta;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/dosearch/{testo}', function($testo) {
    $testo= str_replace(' ', '+', $testo);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=$testo");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    echo $result;

});





