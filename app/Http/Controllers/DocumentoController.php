<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DocumentoController extends Controller
{
    public function index(){
        $documentos=documento::all()->sortByDesc('id');
        return view('documentos.index',['documentos'=>$documentos]);
    }
    public function create(){
        return view('documentos.create');
    }
    
    public function store(Request $request){

        $request->validate([
            'docNumero'=>'required',
            'docFechEmision'=>'required',
            'docRemit'=>'required',
            'docDest'=>'required',
            'docAsunto'=>'required',
            'docEscan'=>'required',
            'docLibro'=>'required',
        ]);

        $documento = new Documento();

        $documento->docNumero=$request->docNumero;
        $documento->docFechEmision=$request->docFechEmision;
        $documento->docRemit=$request->docRemit;
        $documento->docDest=$request->docDest;
        $documento->docAsunto=$request->docAsunto;
        $documento->docEscan=$request->file('docEscan')->store('imgDocumentos','public');
        $documento->docLibro=$request->docLibro;
        
        $documento->saveOrFail();
        
        return redirect()->route('documentos.index')->with('mensaje','Se ha registrado correctamente');
    }
    public function show($id){
        $documento=documento::findOrFail($id);
        return view('documentos.show',['documento'=>$documento]);
    }
    public function edit($id){
        $documento=documento::findOrFail($id);
        return view('documentos.edit',['documento'=>$documento]);
    }
    public function update(Request $request,$id){

        $request->validate([
            'docNumero'=>'required',
            'docFechEmision'=>'required',
            'docRemit'=>'required',
            'docDest'=>'required',
            'docAsunto'=>'required',
            'docEscan'=>'required',
            'docLibro'=>'required',
        ]);

        $documento=documento::find($id);

        $documento->docNumero=$request->docNumero;
        $documento->docFechEmision=$request->docFechEmision;
        $documento->docRemit=$request->docRemit;
        $documento->docDest=$request->docDest;
        $documento->docAsunto=$request->docAsunto;
        if($request->hasFile('docEscan')){
            storage::delete('public/'.$documento->docEscan);
            $documento->docEscan= $request->file('docEscan')->store('imgDocumentos','public');
        }
        // $documento->docEscan=$request->file('docEscan')->store('imgDocumentos','public');
        $documento->docLibro=$request->docLibro;

        $documento->saveOrFail();
        return redirect()->route('documentos.index')->with('mensaje','Se actualizó correctamente');
    }
    public function destroy($id){
        documento::destroy($id);
        return redirect()->route('documentos.index')->with('mensaje','Eliminado correctamente');
    }
}
