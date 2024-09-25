<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\clientcontroller;
use App\Http\Controllers\modulecontroller;          
use App\Http\Controllers\groupecontroller;          
use App\Http\Controllers\accescontroller;          
use App\Http\Controllers\navigationcontroller;          
use App\Http\Controllers\attributioncontroller;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () 
{
    return view('back1.pages.dashboard');
});


Route::get('/dashboard', function () {
    return view('back.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/app/client',clientcontroller::class)-> middleware('auth');
route::get('/client-activation/{id}',[clientcontroller::class,'state'])-> name('client.state');

Route::resource('/app/module',modulecontroller::class)-> middleware('auth');
route::get('/module-activation/{id}',[modulecontroller::class,'state'])-> name('module.state');

Route::resource('/app/groupe',groupecontroller::class)-> middleware('auth');
route::get('/groupe-activation/{id}',[groupecontroller::class,'state'])-> name('groupe.state');

Route::resource('/app/acces',accescontroller::class)-> middleware('auth');
route::get('/acces-activation/{id}',[accescontroller::class,'state'])-> name('acces.state');

Route::resource('/app/attribution',attributioncontroller::class)-> middleware('auth');
route::get('/attribution-activation/{id}',[attributioncontroller::class,'state'])-> name('attribution.state');

//Route::controller(navigationcontroller::class)-> middleware('auth');

require __DIR__.'/auth.php';

//route::get()-> ;