<?php


use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;

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

Route::middleware('auth:sanctum')->get('/user',function(Request $request){
    return $request->user();
});

Route::get('login',function(){
    return User::firstOrFail()->createToken('auth_token')->plainTextToken;
})->name('login');

