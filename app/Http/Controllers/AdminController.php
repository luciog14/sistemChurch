<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defuncion;
use App\Models\Confirmacione;
use App\Models\Matrimonio;
use App\Models\Bautizo;
use App\Http\Controllers\Auth;

class AdminController extends Controller{

    public function index(){
        $defunciones=Defuncion::all();
        $confirmaciones=Confirmacione::all();
        $matrimonios=Matrimonio::all();
        $bautizos=Bautizo::all();
        return view('index',[
            'defunciones'=>$defunciones,
            'confirmaciones'=>$confirmaciones,
            'matrimonios'=>$matrimonios,
            'bautizos'=>$bautizos
        ]);
    }
}
