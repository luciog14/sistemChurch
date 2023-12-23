<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Confirmacione
 *
 * @property $id
 * @property $confCedula
 * @property $confNombre
 * @property $confApellido
 * @property $confPadreId
 * @property $confMadreId
 * @property $confPadrinoId
 * @property $confMadrinaId
 * @property $confParrocoId
 * @property $confFechaRegistro
 * @property $confRegistroEclesiastico
 * @property $created_at
 * @property $updated_at
 *
 * @property Madre $madre
 * @property Madrina $madrina
 * @property Padre $padre
 * @property Padrino $padrino
 * @property Parroco $parroco
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Confirmacione extends Model
{

    static $rules = [
		'confCedula' => 'required|numeric|max:9999999999',
		'confNombre' => 'required',
		'confApellido' => 'required',
		'confFechaRegistro' => 'required',
		'confRegistroEclesiastico' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['confCedula','confNombre','confApellido','confPadreId','confMadreId','confPadrinoId','confMadrinaId','confParrocoId','confFechaRegistro','confRegistroEclesiastico'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function madre()
    {
        return $this->hasOne('App\Models\Madre', 'id', 'confMadreId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function madrina()
    {
        return $this->hasOne('App\Models\Madrina', 'id', 'confMadrinaId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function padre()
    {
        return $this->hasOne('App\Models\Padre', 'id', 'confPadreId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function padrino()
    {
        return $this->hasOne('App\Models\Padrino', 'id', 'confPadrinoId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroco()
    {
        return $this->hasOne('App\Models\Parroco', 'id', 'confParrocoId');
    }


}
