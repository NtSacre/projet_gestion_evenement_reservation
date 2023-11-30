<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControlleur;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AssociationControlleur;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Route pour la gestion d'evenement
Route::middleware(['auth:association', 'is_assoc'])->group(function(){
    Route::prefix('evenement')->name('evenement.')->group(
        function () {
            Route::get('/index', [EvenementController::class, 'index'])->name('index');
            Route::get('/create', [EvenementController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [EvenementController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [EvenementController::class, 'update'])->name('update');
            Route::get('/NombreReservation/{id}', [EvenementController::class, 'nombreReservation'])->name('nombreReservation');
            Route::post('/store', [EvenementController::class, 'store'])->name('store');
            Route::post('/updateReservation/{id}', [ReservationController::class, 'updateReservation'])->name('updateReservation');
            Route::post('/destroy/{id}', [EvenementController::class, 'destroy'])->name('destroy');
        }
    
    );
});



//Route pour les utilisateurs association
Route::prefix('association')->name('assoc.')->group(
    function () {
        Route::get('/create', [AssociationControlleur::class, 'create'])->name('create');
        Route::get('/index', [AssociationControlleur::class, 'index'])->name('index');
        Route::get('/seconnecter', [AssociationControlleur::class, 'edit'])->name('edit');
        Route::post('/store', [AssociationControlleur::class, 'store'])->name('store');
        Route::post('/connexion', [AssociationControlleur::class, 'connexion'])->name('connexion');
        Route::get('logout', [AssociationControlleur::class, 'logout'])->name('logout');

    }

);

//Route pour les utilisateurs simple
Route::prefix('client')->name('client.')->group(
    function () {
        Route::get('/create', [ClientController::class, 'create'])->name('create');
  
        Route::get('/seconnecter', [ClientController::class, 'edit'])->name('edit');
        Route::post('/store', [ClientController::class, 'store'])->name('store');
        Route::post('/connexion', [ClientController::class, 'connexion'])->name('connexion');
        Route::get('logout', [ClientController::class, 'logout'])->name('logout');

    }

);
//Route pour la reservation
Route::middleware(['authUser:client', 'is_user'])->group(function(){
    Route::prefix('reservation')->name('reservation.')->group(function(){
        Route::get('/create/{id}', [ReservationController::class, 'create'])->name('create');
       
    
       
        Route::post('/connexion', [ReservationController::class, 'connexion'])->name('connexion');
    });
});

//Route pour la page d'acceuille du site
Route::prefix('/')->name('home.')->group(function () {
    Route::get('home', [HomeControlleur::class, 'index'])->name('index');
    Route::get('home/show/{id}', [HomeControlleur::class, 'show'])->name('show');
});
Route::get('/nav', function () {
    return view('Evenement.slidebar');
});
require __DIR__ . '/auth.php';
