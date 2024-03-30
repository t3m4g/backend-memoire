<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DestinataireController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\MarchandiseController;
use App\Http\Controllers\Api\CommandeController;

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




//Route pour afficher la liste des User
Route::get('all_users', [UserController::class, 'index']);

// Route pour store un compte user
Route::post('user_store', [UserController::class,'store']);

// Route pour show un compte User
Route::get('user_show/{id}', [UserController::class,'show']);

// Route pour update un compte User
Route::put('user_update/{id}', [UserController::class,'update']);

// Route pour supprimer un compte etudiantUser
Route::delete('user_destroy/{id}', [UserController::class,'delete']);



//Route pour afficher la liste des Destinataire
Route::get('all_destinataires', [DestinataireController::class, 'index']);

// Route pour store un compte user
Route::post('destinataire_store', [DestinataireController::class,'store']);

// Route pour show un compte User
Route::get('destinataire_show/{id}', [DestinataireController::class,'show']);

// Route pour update un compte User
Route::put('destinataire_update/{id}', [DestinataireController::class,'update']);

// Route pour supprimer un compte etudiantUser
Route::delete('destinataire_destroy/{id}', [DestinataireController::class,'delete']);



//Route pour afficher la liste des Client
Route::get('all_clients', [ClientController::class, 'index']);

// Route pour store un compte user
Route::post('client_store', [ClientController::class,'store']);

// Route pour show un compte User
Route::get('client_show/{id}', [ClientController::class,'show']);

// Route pour update un compte User
Route::put('client_update/{id}', [ClientController::class,'update']);

// Route pour supprimer un compte etudiantUser
Route::delete('client_destroy/{id}', [ClientController::class,'delete']);



//Route pour afficher la liste des Marchandises
Route::get('all_marchandises', [MarchandiseController::class, 'index']);

// Route pour store un compte user
Route::post('marchandise_store', [MarchandiseController::class,'store']);

// Route pour show un compte User
Route::get('marchandise_show/{id}', [MarchandiseController::class,'show']);

// Route pour update un compte User
Route::put('marchandise_update/{id}', [MarchandiseController::class,'update']);

// Route pour supprimer un compte etudiantUser
Route::delete('marchandise_destroy/{id}', [MarchandiseController::class,'delete']);



//Route pour afficher la liste des Commandes
Route::get('all_commandes', [CommandeController::class, 'index']);

// Route pour store un compte user
Route::post('commande_store', [CommandeController::class,'store']);

// Route pour show un compte User
Route::get('commande_show/{id}', [CommandeController::class,'show']);

// Route pour update un compte User
Route::put('commande_update/{id}', [CommandeController::class,'update']);

// Route pour supprimer un compte etudiantUser
Route::delete('commande_destroy/{id}', [CommandeController::class,'delete']);
