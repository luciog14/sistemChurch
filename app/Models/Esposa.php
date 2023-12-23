<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esposa extends Model
{
    use HasFactory;

    // Definir la relación con los matrimonios
    public function matrimonios(){
        return $this->hasMany(Matrimonio::class, 'matEsposaId');
    }
}
