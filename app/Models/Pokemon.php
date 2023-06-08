<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pokemon
 *
 * @property $pokemon
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pokemon extends Model
{
  protected $table = 'pokemons';
  public $timestamps = false;
  
    static $rules = [
		'pokemon' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pokemon'];



}
