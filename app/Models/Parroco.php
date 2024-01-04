<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroco extends Model
{
    use HasFactory;
    public function bautizos(){
        return $this->hasMany(Bautizo::class, 'bauParrocoId');
    }
    public function confirmaciones(){
        return $this->hasMany(Confirmacione::class, 'confParrocoId');
    }
    public function matrimonios(){
        return $this->hasMany(Matrimonio::class, 'matParrocoId');
    }
}
