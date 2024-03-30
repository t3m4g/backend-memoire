<?php

namespace App\Http\Controllers\Api;
use \App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //DOC POUR LA METHODE afficher_liste_

    /**
     * @OA\Get(
     *     path="/api/all_users",
     *     summary="Afficher la liste des User",
     *     description="Renvoyer la liste de tous les utilisateurs ayant créer un compte ",
     *     tags={"The_user"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response="200",
     *         description="Les utilisateurs ayant un compte ont été trouvé et leurs informations sont retournées",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Aucun utilisateur ayant créer un compte dans la base de données ",
     *         @OA\JsonContent()
     *     ),
     * )
     */  
    //  Afficher la liste des utilisateurs de la base données.

    public function index()
    {
        return User::all();
    }

    
    //DOC POUR LA METHODE show_
    
    /**
     * @OA\Get(
     *     path="/api/user_show/{id}",
     *     summary="Afficher les infos d'un utilisateur",
     *     description="Renvoyer les infos du compte d'un utilisateur",
     *     tags={"The_user"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Identifiant de l'étudiant à voir ",
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
        return User::find($request->id);
    }


    //DOC POUR LA METHODE store_

    /**

     * @OA\Post(
     *     path="/api/user_store",
     *     summary="Enregistrer un nouvel User",
     *     tags={"The_user"},

     *       @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Name de l'utilisateur",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="poste",
     *         in="query",
     *         description="Poste occupé par l'utilisateur.",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="Email de l'utilisateur.",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="Password de l'utilisateur",
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
     *         description="Un utilisateur avec ces informations existe déja",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $the_user = User::findOrFail($id);
        $the_user->update($request->all());

        return $the_user;
    }


      //DOC POUR LA METHODE destroy_
    /**
     * @OA\Delete(
     *     path="/api/user_destroy/{id}",
     *     summary="Supprimer un compte d'utilisateur",
     *     description="Elle se charger de supprimer un  et donc son compte",
     *     tags={"The_user"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Identifiant de l'utilisateur à supprimer",
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
        $User = User::findOrFail($request->id);
        $User->delete();

        return 204;
    }
}
