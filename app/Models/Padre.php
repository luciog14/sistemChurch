<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    use HasFactory;
    public function bautizos(){
        return $this->hasMany(Bautizo::class, 'bauPadreId');
    }
    public function confirmaciones(){
        return $this->hasMany(Confirmacione::class, 'confPadreId');
    }
}
