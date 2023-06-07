<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

/**
 * Class PokemonController
 * @package App\Http\Controllers
 */
class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemon = Pokemon::paginate();

        $pokemons = Pokemon::all();
        return response()->json($pokemons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pokemon = new Pokemon();
        return view('pokemon.create', compact('pokemon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $pokemon = new Pokemon();
            $pokemon->pokemon = $request->input('pokemon');
            $pokemon->save();
    
            return response()->json($pokemon, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($pokemonId)
    {
        $pokemon = Pokemon::where('pokemon', $pokemonId)->first();
        if ($pokemon) {
            return response()->json($pokemon);
        } else {
            return response()->json(['error' => 'Pokemon not found'], 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pokemon = Pokemon::find($id);

        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pokemon $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        request()->validate(Pokemon::$rules);

        $pokemon->update($request->all());

        return redirect()->route('pokemon.index')
            ->with('success', 'Pokemon updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

     public function destroy($pokemonId)
    {    
        try {
            $deletedRows = Pokemon::where('pokemon', $pokemonId)->delete();
        
            if ($deletedRows) {
                $pokemons = Pokemon::all();
                return response()->json($pokemons);
            } else {
                return response("Pokemon not found");
            }
        } catch (\Exception $e) {
            return response("Error: " . $e->getMessage(), 500);
        }esponse("Error: " . $e->getMessage(), 500);
    }  

}
