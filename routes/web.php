<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\clientcontroller;
use App\Http\Controllers\modulecontroller;          
use App\Http\Controllers\groupecontroller;          
use App\Http\Controllers\accescontroller;          
use App\Http\Controllers\navigationcontroller;          
use App\Http\Controllers\attributioncontroller;
use App\Http\Controllers\Temoignagecontroller;
use App\Http\Controllers\Partenairecontroller;
use App\Http\Controllers\Programmecontroller;
use App\Http\Controllers\Servicecontroller;
use App\Http\Controllers\Pagecontroller;
use App\Models\Programme;

//use Illuminate\Auth\Events\Authenticated;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

//Route::get('/dashboard', function () {
  //  return view('back.pages.dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

// !!!!!! important !!!!!!!




// espace user
/* Route::get('/app',function()
{
    return view('back.pages.dashboard');
} ) ->middleware(['auth:web','verified'])->name('app.dashboard');
 
 
// ici c'est pour la connexion user avec le web
Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route::resource('/app/client',clientcontroller::class)-> middleware('auth');
    //route::get('/client-activation/{id}',[clientcontroller::class,'state'])-> name('client.state');

   //// Route::resource('/app/module',modulecontroller::class)-> middleware('auth');
   // route::get('/module-activation/{id}',[modulecontroller::class,'state'])-> name('module.state');

   // Route::resource('/app/groupe',groupecontroller::class)-> middleware('auth');
    //route::get('/groupe-activation/{id}',[groupecontroller::class,'state'])-> name('groupe.state');

    //Route::resource('/app/acces',accescontroller::class)-> middleware('auth');
    //route::get('/acces-activation/{id}',[accescontroller::class,'state'])-> name('acces.state');

    //Route::resource('/app/attribution',attributioncontroller::class)-> middleware('auth');
    //route::get('/attribution-activation/{id}',[attributioncontroller::class,'state'])-> name('attribution.state');
});
require __DIR__.'/auth.php';*/

//Route::controller(navigationcontroller::class)-> middleware('auth');

// espace admin
Route::get('/admin',function()
{
    return view('admin.pages.dashboard');
} ) ->middleware(['auth:admin','verified'])->name('admin.dashboard');

// ici c'est pour la connexion admin avec le 
Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route::resource('/admin/client',clientcontroller::class);
    //route::get('/client-activation/{id}',[clientcontroller::class,'state'])-> name('client.state');

    Route::resource('/admin/module',modulecontroller::class);
    route::get('/module-activation/{id}',[modulecontroller::class,'state'])-> name('module.state');

    Route::resource('/admin/groupe',groupecontroller::class);
    route::get('/groupe-activation/{id}',[groupecontroller::class,'state'])-> name('groupe.state');

    Route::resource('/admin/acces',accescontroller::class);
    route::get('/acces-activation/{id}',[accescontroller::class,'state'])-> name('acces.state');

    Route::resource('/admin/attribution',attributioncontroller::class)-> middleware('adminauth');
    route::get('/attribution-activation/{id}',[attributioncontroller::class,'state'])-> name('attribution.state');

    Route::resource('/admin/Temoignage',Temoignagecontroller::class);
    route::get('/Temoignage-activation/{id}',[Temoignagecontroller::class,'state'])-> name('Temoignage.state');

    Route::resource('/admin/Partenaire',Partenairecontroller::class);
    route::get('/Partenaire-activation/{id}',[Partenairecontroller::class,'state'])-> name('Partenaire.state');

    Route::resource('/admin/Programme',Programmecontroller::class);
    route::get('/Programme-activation/{id}',[Programmecontroller::class,'state'])-> name('Programme.state');

    Route::resource('/admin/Service',Servicecontroller::class);
    route::get('/Service-activation/{id}',[Servicecontroller::class,'state'])-> name('Service.state');

});

require __DIR__.'/adminauth.php';

// espace client
Route::get('/adepme',function()
{
    return view('adepme.pages.dashboard');
} );

Route::get('/client',function()
{
    return view('client.pages.dashboard');
} ) ->middleware(['auth:client','verified'])->name('client.dashboard');
// ici c'est pour la connexion client avec le 
Route::middleware('auth:client')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route::resource('/client/client',clientcontroller::class);
    //route::get('/client-activation/{id}',[clientcontroller::class,'state'])-> name('client.state');

    //Route::resource('/client/module',modulecontroller::class);
    //route::get('/module-activation/{id}',[modulecontroller::class,'state'])-> name('module.state');


        // Route::get('/adepme/page/page', 'Pacontroller@maMethode')->name('route_page');
    Route::get('/adepme/page/page_service/{id}', [Pagecontroller::class, 'redirection_service'])->name('page.service');
    Route::get('/adepme/page/page_partenaire', [Pagecontroller::class, 'redirection_partenaire'])->name('page.partenaire');
    Route::get('/adepme/page/page_programme/{id}', [Pagecontroller::class, 'redirection_programme'])->name('page.programme');
    Route::get('/adepme/page/page_partenaire_detail/{id}', [Pagecontroller::class, 'redirection_part_detail'])->name('page.part.detail');
    Route::get('/adepme/page/page_contact', [Pagecontroller::class, 'redirection_contact'])->name('page.contact');
    Route::get('/adepme/page/page_mots_directeur', [Pagecontroller::class, 'redirection_mots_directeur'])->name('page.mots_dirlo');
    Route::get('/adepme/page/page_chef_etat', [Pagecontroller::class, 'redirection_chef_etat'])->name('page.chef_etat');


    Route::resource('/adepme/groupe',groupecontroller::class);
    route::get('/groupe-activation/{id}',[groupecontroller::class,'state'])-> name('groupe.state');

    Route::resource('/adepme/acces',accescontroller::class);
    route::get('/acces-activation/{id}',[accescontroller::class,'state'])-> name('acces.state');

    Route::resource('/client/attribution',attributioncontroller::class)-> middleware('clientauth');
    route::get('/attribution-activation/{id}',[attributioncontroller::class,'state'])-> name('attribution.state');
});

require __DIR__.'/clientauth.php';
