<?php

namespace App\Http\Controllers;

use App\Models\Defuncion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DefuncionController extends Controller
{
    public function index(){
       $defunciones=Defuncion::all()->sortByDesc('id');
       return view('defunciones.index',['defunciones'=>$defunciones]);
    }
    public function create(){
        return view('defunciones.create');
    }
    public function store(Request $request){

        $request->validate([
            'defCedula'=>'required',
            'defNombre'=>'required',
            'defApellido'=>'required',
            'defRegistro'=>'required',
        ]);

        $defuncion = new Defuncion();

        $defuncion->defCedula=$request->defCedula;
        $defuncion->defNombre=$request->defNombre;
        $defuncion->defApellido=$request->defApellido;
        $defuncion->defRegistro=$request->defRegistro;
        
        $defuncion->saveOrFail();
        
        return redirect()->route('defunciones.index')->with('mensaje','Registro Exitoso');
    }
    public function show($id){
        $defuncion=Defuncion::findOrFail($id);
        return view('defunciones.show',['defuncion'=>$defuncion]);
    }
    public function edit($id){
        $defuncion=Defuncion::findOrFail($id);
        return view('defunciones.edit',['defuncion'=>$defuncion]);
    }
    public function update(Request $request,$id){

        $request->validate([
            'defCedula'=>'required',
            'defNombre'=>'required',
            'defApellido'=>'required',
            'defRegistro'=>'required',
        ]);

        $defuncion=defuncion::find($id);

        $defuncion->defCedula=$request->defCedula;
        $defuncion->defNombre=$request->defNombre;
        $defuncion->defApellido=$request->defApellido;
        $defuncion->defRegistro=$request->defRegistro;

        $defuncion->saveOrFail();

        return redirect()->route('defunciones.index')->with('mensaje','Registro Actualizado');
    }
    public function destroy($id){
        Defuncion::destroy($id);
        return redirect()->route('defunciones.index')->with('mensaje','Eliminado Exitosamente');
    }
}
