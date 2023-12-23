<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madre extends Model
{
    use HasFactory;
    // Definir la relación con los matrimonios
    public function bautizos(){
        return $this->hasMany(bautizo::class, 'bauMadreId');
    }
    public function confirmaciones(){
        return $this->hasMany(Confirmacione::class, 'confMadreId');
    }
}
