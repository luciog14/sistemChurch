<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Matrimonio
 *
 * @property $id
 * @property $matFechaRegistro
 * @property $matRegistroEclesiastico
 * @property $matEsposoId
 * @property $matEsposaId
 * @property $matPadrinoId
 * @property $matMadrinaId
 * @property $matParrocoId
 * @property $created_at
 * @property $updated_at
 *
 * @property Esposa $esposa
 * @property Esposo $esposo
 * @property Madrina $madrina
 * @property Padrino $padrino
 * @property Parroco $parroco
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Matrimonio extends Model
{
    
    static $rules = [
		'matFechaRegistro' => 'required',
		'matRegistroEclesiastico' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['matFechaRegistro','matRegistroEclesiastico','matEsposoId','matEsposaId','matPadrinoId','matMadrinaId','matParrocoId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function esposa()
    {
        return $this->hasOne('App\Models\Esposa', 'id', 'matEsposaId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function esposo()
    {
        return $this->hasOne('App\Models\Esposo', 'id', 'matEsposoId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function madrina()
    {
        return $this->hasOne('App\Models\Madrina', 'id', 'matMadrinaId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function padrino()
    {
        return $this->hasOne('App\Models\Padrino', 'id', 'matPadrinoId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroco()
    {
        return $this->hasOne('App\Models\Parroco', 'id', 'matParrocoId');
    }
    

}
