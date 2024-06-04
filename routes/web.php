<?php

use App\Http\Controllers\Api\InvoiceIndexController;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Laravel Sanctum: Package pour la gestion des tokens d'authentification(API tokens)


//La route '/user' est protégée par le middleware 'auth:sanctum': donc on ne peut y accéder que par des utilisateurs authentifiés via Sanctum

//Middleware auth:sanctum : ce middleware verifie que la requête possède un token d'authentification valide émis par Sanctum

//Lorsque la route est appelée, elle retourne les infos de l'utilisateur authentifié, obtenues via $request->user()

Route::middleware('auth:sanctum')->group(static function(): void
{
    Route::get('/user',function(Request $request){
    return $request->user();
});

//Nos routes pour nod facturations

// Route::prefix('invoices')
// ->as('invoices.')
// ->group(
//     static function():void
//     {
//     Route::get('/', InvoiceIndexController::class);
//     })
//     ->name('index');

});
//Ici, la route est accessible sans authentification prealable.

//on récupère le premier utilisateur dans la BD ou une erreur si aucun n'existe.

//User::firstOrFail()->createToken('auth_token')->plainTextToken : crée un nouveau token d'authentification pour ce t utilisateur avec le nom 'auth_token'

Route::get('login',function(){
    return User::firstOrFail()->createToken('auth_token')->plainTextToken;
})->name('login');

