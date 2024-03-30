<?php

namespace App\Http\Controllers\Api;
use \App\Models\Destinataire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinataireController extends Controller
{
    //DOC POUR LA METHODE afficher_liste_

    /**
     * @OA\Get(
     *     path="/api/all_destinataires",
     *     summary="Afficher la liste des Destinataire",
     *     description="Renvoyer la liste de tous les destinataires de marchandises",
     *     tags={"The_destinataire"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response="200",
     *         description="Les destinataires de colis ont été trouvé et leurs informations sont retournées",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Aucun destinataire de marchandise dans la base de données ",
     *         @OA\JsonContent()
     *     ),
     * )
     */  
    //  Afficher la liste des destinataires de la base données.

    public function index()
    {
        return Destinataire::all();
    }

    
    //DOC POUR LA METHODE show_
    
    /**
     * @OA\Get(
     *     path="/api/destinataire_show/{id}",
     *     summary="Afficher les infos d'un destinataire",
     *     description="Renvoyer les infos d'un destinataire",
     *     tags={"The_destinataire"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Identifiant d'un destinataire à voir ",
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
        return Destinataire::find($request->id);
    }


    //DOC POUR LA METHODE store_

    /**

     * @OA\Post(
     *     path="/api/destinataire_store",
     *     summary="Enregistrer un nouveau destinataire",
     *     tags={"The_destinataire"},

     *       @OA\Parameter(
     *         name="nom_prenom",
     *         in="query",
     *         description="Nom et prénom du destinataire",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="telephone",
     *         in="query",
     *         description="Téléphone du destinataire.",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="Email du destinataire.",
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
     *         description="Un destinataire avec ces informations existe déja",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function store(Request $request)
    {
        return Destinataire::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $the_user = Destinataire::findOrFail($id);
        $the_user->update($request->all());

        return $the_user;
    }


      //DOC POUR LA METHODE destroy_
    /**
     * @OA\Delete(
     *     path="/api/destinataire_destroy/{id}",
     *     summary="Supprimer un destinataire",
     *     description="Elle se charger de supprimer un  et donc son compte",
     *     tags={"The_destinataire"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Identifiant du destinataire à supprimer",
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
        $User = Destinataire::findOrFail($request->id);
        $User->delete();

        return 204;
    }
}
