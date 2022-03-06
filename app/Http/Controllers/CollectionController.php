<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\Raccolta;
use App\Models\Contenuto;
use App\Models\Utente;

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
    class CollectionController extends BaseController {

        function viewcollection(Request $request, $raccolta) {
            $user= $request->session()->get("username");
            if (!isset($user)) {
                return redirect("login");
            }
            else {
                $query= Raccolta::join("utente", "raccolta.nick", "=", "utente.username")
                        ->where("raccolta.nick", $user)
                        ->where("raccolta.nome", $raccolta)
                        ->distinct()
                        ->count();
                if ($query > 0) {
                    return view("collection")->with("raccolta", $raccolta);
                }
                else {
                    return view("error");
                }
            }
        }


        function loadcontenuto(Request $request, $collect) {
         //   $collect= $request["collect"];
            $array= Contenuto::where("nome_raccolta", $collect)->get();
            echo $array;
        }


        function deletecontenuto(Request $request) {
            $name= $request["name"];
            $collect= $request["collect"];
            $array= Contenuto::where("nome", $name)->where("nome_raccolta", $collect)->delete();
            $risultato= 1;
            echo json_encode($risultato);
        }

    }
