<?php

namespace App\Http\Controllers\Api;
use \App\Models\Marchandise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarchandiseController extends Controller
{
    //DOC POUR LA METHODE afficher_liste_

    /**
     * @OA\Get(
     *     path="/api/all_marchandises",
     *     summary="Afficher la liste des marchandises",
     *     description="Renvoyer la liste de tous les marchandises",
     *     tags={"The_marchandise"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response="200",
     *         description="Les marchandises ont été trouvé et leurs informations sont retournées",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Aucune marchandise dans la base de données ",
     *         @OA\JsonContent()
     *     ),
     * )
     */  
    //  Afficher la liste des marchandises de la base données.

    public function index()
    {
        return Marchandise::all();
    }

    
    //DOC POUR LA METHODE show_
    
    /**
     * @OA\Get(
     *     path="/api/marchandise_show/{id}",
     *     summary="Afficher les infos d'une marchandise",
     *     description="Renvoyer les infos d'une marchandise",
     *     tags={"The_marchandise"},
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
        return Marchandise::find($request->id);
    }


    //DOC POUR LA METHODE store_

    /**

     * @OA\Post(
     *     path="/api/marchandise_store",
     *     summary="Enregistrer une nouvelle marchandise",
     *     tags={"The_marchandise"},

     *       @OA\Parameter(
     *         name="info",
     *         in="query",
     *         description="Information sur la marchandise",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="nbr_colis",
     *         in="query",
     *         description="Nombre de colis.",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="type_colis",
     *         in="query",
     *         description="Type dee colis.",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="catégorie",
     *         in="query",
     *         description="Categorie d'apartenance du colis.",
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
        return Marchandise::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $the_user = Marchandise::findOrFail($id);
        $the_user->update($request->all());

        return $the_user;
    }


      //DOC POUR LA METHODE destroy_
    /**
     * @OA\Delete(
     *     path="/api/marchandise_destroy/{id}",
     *     summary="Supprimer une marchandise",
     *     description="Elle se charger de supprimer un  et donc son compte",
     *     tags={"The_marchandise"},
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
        $User = Marchandise::findOrFail($request->id);
        $User->delete();

        return 204;
    }
}
