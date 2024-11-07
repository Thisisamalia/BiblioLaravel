<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Addcontroller;  /* importation de mon controleur addcontroller */
use App\Http\Controllers\ContactController; /* importer ContactController */
use App\Http\Controllers\NouveauteController; /* importer Nouveaute Controller */
 
/*la route du root du site*/
Route::get('/', function () {
    return view('homepage');
});
 
/*route pour contacter-nous pour que ca affiche contact*/
Route::get('/contact', function () {
    return view('contact');
});
 
/*route pour les messages pour que ca affiche le view des messages*/
Route::get('/message', function () {
    return view('message');
});
 
/* route pour quand je clique sur le boutton ajouter un livre que ca affiche le formulaire qui a comme view addbook*/
Route::get('/addbook', function () {
    return view('addbook');
});
 
 //store est la function dans mon Addcontroller.php pour que quand je submit le formulaire ca push dans mon array de livre
Route::post('/submit',[AddController::class, 'store']);
 

 
 
 
/*route pour quand je clique sur detail des livres que ca affiche le view detail*/
Route::get('/detail', function () {
    return view('detail');
});
 
 
/*route pour quand je clique sur acceuil que sa affiche view homepage*/
Route::get('/homepage', function () {
    return view('homepage');
});
 
 
 
 
/*routes pour soumettre le formulaire et montrer les messages */
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/message', [ContactController::class, 'showMessages'])->name('messages.show');
 
 
/*route pour nouveaute qui va afficher view nouveaute*/
Route::get('/nouveaute', [NouveauteController::class, 'showNouveautes'])->name('nouveautes.show');