<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\AjouterUserController; //pour ajouter un utilisateur
use App\Http\Controllers\CourrierexterneController; //pour envoyer un courrier externe
use App\Http\Controllers\Displaycourrier; //pour afficher les courrier dans la boite de reception
use App\Http\Controllers\approbationController;
use App\Http\Controllers\EnvoyeController;
use App\Http\Controllers\plusController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\Checkrole1;
use App\Http\Controllers\supprimerutilisateurController;

use App\Http\Controllers\supprimerCourrierController;
use App\Http\Controllers\FavoritesController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Directeur', function () {
    return view('Directeur');
})->middleware('auth')->name('directeur');;

Route::get('/Secretaire', function () {
    return view('Secretaire');
})->name('Secretaire')->middleware('Secretaire');

Route::get('/Chef_departement', function () {
    return view('Chef_departement');
})->name('Chef_departement')->middleware('Chef_departement');

Route::get('/Chef_service', function () {
    return view('Chef_service');
})->name('Chef_service')->middleware('Chef_service');

Route::get('/Fonctionnaire', function () {
    return view('Fonctionnaire');
})->name('Fonctionnaire')->middleware('Fonctionnaire');

Route::get('/inbox', function () {
    return view('inbox');
});

Route::get('/new_courrier', function () {
    return view('new_courrier');
});

Route::get('/Ajouter', function () {
    return view('Ajouter_user');
});
Route::get('/Corbeille', function () {
    return view('Corbeille');
});
Route::get('/approbation', [approbationController::class, 'index'])->middleware('checkRole')->name('approbation');

Route::get('/sortant', function () {
    return view('sortant');
});
Route::get('/submit_email', function () {
    return view('submit_email');
});

Route::get('/envoi', [EmailController::class, 'showForm']);
//Route::post('/submit_email', [EmailController::class, 'submitEmail']);
//Route::get('/form1', function () {
//  return view('form1');
//});

Route::post('/transfert', 'TransfertController@action')->name('transfert');
Route::post('/courrier', [CourrierController::class, 'store'])->name('courrier.store');
// restriction de la fonctionnalite ajouter utilisateur
Route::post('/ajouter_user', [AjouterUserController::class, 'ajouter'])
    ->name('ajouter_user.store')
    ->middleware(Checkrole1::class);

Route::post('/courrierexterne', [CourrierexterneController::class, 'storeexterne'])->name('courrierexterne.storeexterne');
Route::get('/inbox', [Displaycourrier::class, 'index'])->name('inbox.index');


// restriction de la fonctionnalite approbation ; reserver juste au Directeur

Route::get('/approbation', [approbationController::class, 'index1'])
    ->name('approbation.index1')
    ->middleware(CheckRole::class);

Route::get('/envoye', [EnvoyeController::class, 'index'])->name('envoye.index');


Route::get('/plus', [plusController::class, 'afficherPlus'])->name('plus');

Route::get('/supprimer-utilisateur', [plusController::class, 'supprimerUtilisateur'])->name('supprimer-utilisateur');
Route::get('/archiver', [plusController::class, 'archiver'])->name('archiver');
Route::get('/statistiques', [plusController::class, 'afficherStatistiques'])->name('statistiques');


Route::get('/supprimer-utilisateur', [supprimerutilisateurController::class, 'afficherUtilisateurs'])
    ->name('supprimer-utilisateur')
    ->middleware(CheckRole::class);

Route::delete('/supprimer-utilisateur/{id}', [supprimerutilisateurController::class, 'supprimerUtilisateur']);


Route::get('/utilisateurs', [UserController::class, 'liste'])->name('utilisateurs.liste');
Route::get('/utilisateurs', [UserController::class, 'liste'])->name('liste-utilisateurs');
Route::get('/utilisateurs', [SupprimerUtilisateurController::class, 'liste'])->name('liste-utilisateurs');


Route::delete('/supprimer-utilisateur1/{id}', [SupprimerUtilisateurController::class, 'supprimerUtilisateur'])
    ->name('supprimer-utilisateur1');



// appel du middleware pour controller l acces
Route::get('/acces-refuse', function () {
    return view('acces-refuse');
})->name('acces-refuse');



//supprimer un courrier

Route::delete('/supprimer-courrier/{id}', [SupprimerCourrierController::class, 'supprimerCourrier'])->name('supprimer-courrier');




// Route pour afficher les courriers favoris
Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites.index');

// Route pour ajouter un courrier aux favoris
Route::post('/favorites/add', [FavoritesController::class, 'add'])->name('favorites.add');

// Route pour retirer un courrier des favoris
Route::delete('/favorites/remove/{id}', [FavoritesController::class, 'remove'])->name('favorites.remove');
