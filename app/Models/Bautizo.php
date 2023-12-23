<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bautizo
 *
 * @property $id
 * @property $bauCedula
 * @property $bauFechaBautismo
 * @property $bauNombre
 * @property $bauApellido
 * @property $bauGenero
 * @property $bauEstado
 * @property $bauNacionalidad
 * @property $bauFechaNac
 * @property $bauLugarNac
 * @property $bauFechaReg
 * @property $bauLugarReg
 * @property $bauRegCivil
 * @property $bauRegEcles
 * @property $bauPadreId
 * @property $bauMadreId
 * @property $bauPadrinoId
 * @property $bauMadrinaId
 * @property $bauParrocoId
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
class Bautizo extends Model
{

    static $rules = [
		// 'bauCedula' => 'required',
        'bauCedula'=>'required|numeric|max:9999999999',
		'bauFechaBautismo' => 'required',
		'bauNombre' => 'required',
		'bauApellido' => 'required',
		'bauGenero' => 'required',
		'bauEstado' => 'required',
		'bauNacionalidad' => 'required',
		'bauFechaNac' => 'required',
		'bauLugarNac' => 'required',
		'bauFechaReg' => 'required',
		'bauLugarReg' => 'required',
		'bauRegCivil' => 'required',
		'bauRegEcles' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bauCedula','bauFechaBautismo','bauNombre','bauApellido','bauGenero','bauEstado','bauNacionalidad','bauFechaNac','bauLugarNac','bauFechaReg','bauLugarReg','bauRegCivil','bauRegEcles','bauPadreId','bauMadreId','bauPadrinoId','bauMadrinaId','bauParrocoId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function madre()
    {
        return $this->hasOne('App\Models\Madre', 'id', 'bauMadreId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function madrina()
    {
        return $this->hasOne('App\Models\Madrina', 'id', 'bauMadrinaId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function padre()
    {
        return $this->hasOne('App\Models\Padre', 'id', 'bauPadreId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function padrino()
    {
        return $this->hasOne('App\Models\Padrino', 'id', 'bauPadrinoId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroco()
    {
        return $this->hasOne('App\Models\Parroco', 'id', 'bauParrocoId');
    }


}
