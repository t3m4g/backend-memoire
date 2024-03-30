<?php

namespace App\Http\Controllers\Api;
use \App\Models\Commande;
use \App\Models\User;
use \App\Models\Destinataire;
use \App\Models\Marchandise;
use \App\Models\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //DOC POUR LA METHODE afficher_liste_

    /**
     * @OA\Get(
     *     path="/api/all_commandes",
     *     summary="Afficher la liste des commandes",
     *     description="Renvoyer la liste de tous les commandes",
     *     tags={"The_commande"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response="200",
     *         description="Les commandes ont été trouvé et leurs informations sont retournées",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Aucune marchandise dans la base de données ",
     *         @OA\JsonContent()
     *     ),
     * )
     */  
    //  Afficher la liste des commandes de la base données.

    public function index()
    {
        return Commande::all();
    }

    
    //DOC POUR LA METHODE show_
    
    /**
     * @OA\Get(
     *     path="/api/commande_show/{id}",
     *     summary="Afficher les infos d'une marchandise",
     *     description="Renvoyer les infos d'une marchandise",
     *     tags={"The_commande"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Identifiant d'une marchandise à voir ",
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
        return Commande::find($request->id);
    }


    //DOC POUR LA METHODE store_

    /**

     * @OA\Post(
     *     path="/api/commande_store",
     *     summary="Enregistrer une nouvelle marchandise",
     *     tags={"The_commande"},

     *      @OA\Parameter(
     *         name="client_id",
     *         in="query",
     *         description="Identifiant d'un client.",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="Identifiant d'un utilisateur.",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="marchandise_id",
     *         in="query",
     *         description="Identifiant d'une marchandise.",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="destinataire_id",
     *         in="query",
     *         description="Identifiant d'un destinataire.",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
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
        $marchandise = Marchandise::find($request->marchandise_id);
        $destinataire = Destinataire::find($request->destinataire_id);
        $client = Client::find($request->client_id);
        $user = User::find($request->user_id);

        $commande = Commande::create([
            'client_id' => $request->input('client_id'),
            'user_id' => $request->input('user_id'),
            'marchandise_id' => $request->input('marchandise_id'),
            'destinataire_id' => $request->input('destinataire_id'),
            'name_cmd' => 'cmd_' . $marchandise->type_colis . '_' . $request->client_id . $request->destinataire_id . $request->user_id,
        ]);

        $marchandise->commande_id = $commande->id;
        $marchandise->save();
        $destinataire->commande_id = $commande->id;
        $destinataire->save();
        $client->commande_id = $commande->id;
        $client->save();
        $user->commande_id = $commande->id;
        $user->save();

        return $commande;
    }

    public function update(Request $request, $id)
    {
        $the_user = Commande::findOrFail($id);
        $the_user->update($request->all());

        return $the_user;
    }


      //DOC POUR LA METHODE destroy_
    /**
     * @OA\Delete(
     *     path="/api/commande_destroy/{id}",
     *     summary="Supprimer une marchandise",
     *     description="Elle se charger de supprimer un  et donc son compte",
     *     tags={"The_commande"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Identifiant du marchandise à supprimer",
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
        $User = Commande::findOrFail($request->id);
        $User->delete();

        return 204;
    }
}
