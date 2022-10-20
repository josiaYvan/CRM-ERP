<?php

use Chatify\ChatifyMessenger;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chatController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\PostesController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TachesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\vendor\Chatify\Api\MessagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'Admin'])->group(function(){
    Route::resource('personnels', PersonnelsController::class)->except(["index", "show"]);
    Route::resource('clients', ClientsController::class)->except(["index", "show"]);
    Route::resource('postes', PostesController::class)->except(["index", "show"]);
    Route::resource('users', UserController::class);

    Route::get('/bar', [MailController::class, 'mail' ]);
});


Route::middleware('auth')->group(function() {
    Route::resource('profils', ProfilController::class);

    Route::get("personnels/", [PersonnelsController::class, "index"])->name("personnels.index");
    Route::get("personnels/{pesonnel}", [PersonnelsController::class, "show"])->name("personnels.show");

    Route::get("postes", [PostesController::class, "index"])->name("postes.index");
    Route::get("postes/{poste}", [PostesController::class, "show"])->name("postes.show");

    Route::get("clients", [ClientsController::class, "index"])->name("clients.index");
    Route::get("clients/{client}", [ClientsController::class, "show"])->name("clients.show");

    Route::resource('conges', CongeController::class);

    Route::get('/send',[MailController::class,"mail"]);


    Route::get('taches', [TachesController::class, "index"])->name('taches.index');

    Route::get("conges/refuser/{id}", [CongeController::class, "denied"])->name("conges.denied");
});

Route::resource('taches', TachesController::class)->middleware('Admin')->except('index');
Route::post('taches/fait/{tache}', [TachesController::class, "done"])->middleware('Admin')->name('taches.done');


require __DIR__.'/auth.php';
