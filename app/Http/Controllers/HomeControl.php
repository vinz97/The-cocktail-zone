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

     class HomeControl extends BaseController {
            function loadcollection (Request $request) {
                $nick= $request->session()->get("username");
                $array= Raccolta::where("nick", $nick)->get();
                echo $array;
            }


            function loadcover (Request $request) {
                $nick= $request->session()->get("username");
                $array= Raccolta::join("contenuto", "raccolta.nome", "=", "contenuto.nome_raccolta")
                        ->select("raccolta.nome", "raccolta.copertina")
                        ->where("nick", $nick)
                        ->distinct()
                        ->get();
                echo $array;

            }


            function loadraccolta (Request $request) {
                $collectionName= $request["nome_raccolta"];
                $user= $request->session()->get("username");
                $collection= new Raccolta;
                $collection->nome= $collectionName;
                $collection->nick= $user;
                $collection->save();
              //  $array = array('title'=> $collectionName);
               // echo json_encode($array);
                echo json_encode($collectionName);
            }


            function correggicover(Request $request) {
                 //controllo aggiuntivo: se una raccolta ha la copertina di un'immagine di
                // un contenuto che non esiste più in quella raccolta,
                //la copertina viene aggiornata con l'immagine del primo contenuto disponibile
                // se la raccolta è vuota, viene ovviamente rimessa l'immagine di default

                $nick= $request->session()->get("username");
                $check= Raccolta::select("raccolta.nome")
                        ->where("raccolta.nick", $nick)
                        ->whereNotIn("raccolta.copertina", Contenuto::select("contenuto.foto")
                                                            ->where("raccolta.nome", "contenuto.nome_raccolta") )
                        ->get();
         //   echo $check;
          $dimArray= count($check);

                for ($i=0; $i<$dimArray; $i++) {
                   // echo $check[$i];
                    $newCopertina= Contenuto::select("foto")->where("nome_raccolta", $check[$i]["nome"])->first();
                  //  echo $newCopertina["foto"];
                  //  echo $checks["nome"];
                    Raccolta::where("nome", $check[$i]["nome"])->update(["copertina" => $newCopertina["foto"]]);
                }
            }
     }
