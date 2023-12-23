<?php

namespace App\Http\Controllers;

use App\Models\Padrino;
use App\Models\Parroco;
use Illuminate\Http\Request;

class ParrocoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $parroco=Parroco::all()->sortByDesc('id');
        return view('parrocos.index',['parrocos'=>$parroco]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('parrocos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $request->validate([
            'parrTelefono'=>'required',
            'parrNombre'=>'required',
            'parrApellido'=>'required',
            'parrParroquia'=>'required',
        ]);
        $parroco=new Parroco();
        $parroco->parrTelefono=$request->parrTelefono;
        $parroco->parrNombre=$request->parrNombre;
        $parroco->parrApellido=$request->parrApellido;
        $parroco->parrParroquia=$request->parrParroquia;

        $parroco->saveOrFail();

        return redirect()->route('parrocos.index')->with('mensaje','Se ha registrado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $parroco=Parroco::findOrFail($id);
        return view('parrocos.show',['parroco'=>$parroco]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $parroco=Parroco::findOrFail($id);
        return view('parrocos.edit',['parroco'=>$parroco]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id){

        $request->validate([
            'parrTelefono'=>'required',
            'parrNombre'=>'required',
            'parrApellido'=>'required',
            'parrParroquia'=>'required',
        ]);

        $parroco=parroco::find($id);

        $parroco->parrTelefono=$request->parrTelefono;
        $parroco->parrNombre=$request->parrNombre;
        $parroco->parrApellido=$request->parrApellido;
        $parroco->parrParroquia=$request->parrParroquia;

        $parroco->saveOrFail();

        return redirect()->route('parrocos.index')->with('mensaje','Actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        Parroco::destroy($id);
        return redirect()->route('parrocos.index')->with('mensaje','Eliminado correctamente');

    }
}
