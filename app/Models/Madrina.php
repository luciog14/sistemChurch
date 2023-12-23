<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madrina extends Model
{
    use HasFactory;
    public function bautizos(){
        return $this->hasMany(bautizo::class, 'bauMadrinaId');
    }
    public function confirmaciones(){
        return $this->hasMany(Confirmacione::class, 'confMadrinaId');
    }
    public function matrimonios(){
        return $this->hasMany(Matrimonio::class, 'matMadrinaId');
    }
}
