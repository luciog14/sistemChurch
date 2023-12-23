<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padrino extends Model
{
    use HasFactory;

    public function bautizos(){
        return $this->hasMany(Bautizo::class, 'bauPadrinoId');
    }
    public function confirmaciones(){
        return $this->hasMany(Confirmacione::class, 'confPadrinoId');
    }
    public function matrimonios(){
        return $this->hasMany(Matrimonio::class, 'matPadrinoId');
    }
}
