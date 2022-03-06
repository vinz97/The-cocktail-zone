<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\Raccolta;
use App\Models\Contenuto;

    /**
     * Where to redirect users after registration.
     *
     * @param Request $response
     */


    /**
     * Create a new controller instance.
     *
     * @return Response
     */

    class SearchController extends BaseController {

        function addcontenuto (Request $request) {
            $user= $request->session()->get("username");
            $nameCollect= $request["collect"];
            $titolo= $request["title"];
            $id= $request["iD"];
            $istructions= $request["istruz"];
            $categoria= $request["category"];
            $image= $request["immag"];
            $check= Contenuto::where("id_cocktail", $id)->where("nome_raccolta", $nameCollect)->count();
            if ($check <= 0) {
                $content= new Contenuto;
                $content->id_cocktail= $id;
                $content->nome= $titolo;
                $content->foto= $image;
                $content->istruzioni= $istructions;
                $content->tipo= $categoria;
                $content->nome_raccolta= $nameCollect;
                $content->save();
                $controllo= Raccolta::select("copertina")->where("nome", $nameCollect)->where("nick", $user)->whereNull("copertina")->count();
                if ($controllo > 0) {
                    Raccolta::where("nome", $nameCollect)->update(["copertina" => $image]);
                }
            $risultato= 1;
            echo json_encode($risultato);
        }
    else {
        $risultato= 2;
        echo json_encode($risultato);
    }

    }

 }
