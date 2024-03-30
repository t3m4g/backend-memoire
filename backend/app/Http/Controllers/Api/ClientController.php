<?php

namespace App\Http\Controllers\Api;
use \App\Models\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //DOC POUR LA METHODE afficher_liste_

    /**
     * @OA\Get(
     *     path="/api/all_clients",
     *     summary="Afficher la liste des client",
     *     description="Renvoyer la liste de tous les clients de marchandises",
     *     tags={"The_client"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response="200",
     *         description="Les clients de colis ont été trouvé et leurs informations sont retournées",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Aucun client de marchandise dans la base de données ",
     *         @OA\JsonContent()
     *     ),
     * )
     */  
    //  Afficher la liste des clients de la base données.

    public function index()
    {
        return Client::all();
    }

    
    //DOC POUR LA METHODE show_
    
    /**
     * @OA\Get(
     *     path="/api/client_show/{id}",
     *     summary="Afficher les infos d'un client",
     *     description="Renvoyer les infos d'un client",
     *     tags={"The_client"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Identifiant d'un client à voir ",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description=" trouvé  !",
     *         @OA\JsonContent()
     *     ),
     *
     *     @OA\Response(
     *         response="404",
     *         description="Aucun  ne correspond à l'identifiant saisi",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function show(Request $request)
    {
        return Client::find($request->id);
    }


    //DOC POUR LA METHODE store_

    /**

     * @OA\Post(
     *     path="/api/client_store",
     *     summary="Enregistrer un nouveau client",
     *     tags={"The_client"},

     *       @OA\Parameter(
     *         name="nom_prenom",
     *         in="query",
     *         description="Nom et prénom du client",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="telephone",
     *         in="query",
     *         description="Téléphone du client.",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="Email du client.",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Response(
     *         response="200",
     *         description=" enregistre avec succes.",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Echec d'enregistrement de l'.",
     *         @OA\JsonContent()
     *     ),
     *
     *       @OA\Response(
     *         response="402",
     *         description="Un client avec ces informations existe déja",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function store(Request $request)
    {
        return Client::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $the_user = Client::findOrFail($id);
        $the_user->update($request->all());

        return $the_user;
    }


      //DOC POUR LA METHODE destroy_
    /**
     * @OA\Delete(
     *     path="/api/client_destroy/{id}",
     *     summary="Supprimer un client",
     *     description="Elle se charger de supprimer un  et donc son compte",
     *     tags={"The_client"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Identifiant du client à supprimer",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description=" supprimé avec succès!",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="L'étudiant n'existe pas !",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function delete(Request $request)
    {
        $User = Client::findOrFail($request->id);
        $User->delete();

        return 204;
    }
}
