<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/pok', function () {
    return view('index');
});

use App\Http\Controllers\PokemonController;

Route::get('/pokemons', [PokemonController::class, 'index']);

Route::post('/pokemons', [PokemonController::class, 'store']);

Route::get('/pokemons/{pokemonId}', [PokemonController::class, 'show'])->name('pokemon.show');

Route::delete('/pokemons/{pokemonId}', [PokemonController::class, 'destroy']);



