<?php

namespace App\Http\Controllers;

use App\Models\Matrimonio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Models\Esposo;
use App\Models\Esposa;
use App\Models\Padrino;
use App\Models\Madrina;
use App\Models\Parroco;

/**
 * Class MatrimonioController
 * @package App\Http\Controllers
 */
class MatrimonioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function certMat($id) {

        // Obtén los datos del bautizo
        $matrimonio = Matrimonio::find($id);
        // Obtén el nombre del usuario autenticado
        $nombreUsuario = Auth::user()->name;
        $idUsuario = Auth::user()->id;

        // Carga solo la vista sin extender el diseño principal
        $view = View::make('matrimonio.certMat', compact('matrimonio','nombreUsuario','idUsuario'))->render();

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Carga el HTML en Dompdf
        $dompdf->loadHtml($view);

        // Establece el tamaño del papel (puedes ajustarlo según tus necesidades)
        //$dompdf->setPaper('A5', 'landscape');//horizontal
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el PDF (puedes ajustar la calidad según tus necesidades)
        $dompdf->render();

        // Genera la salida del PDF (puedes ajustar la ubicación según tus necesidades)
        $dompdf->stream('certificado_matrimonio.pdf', ['Attachment' => false]);
    }
    public function index(){

        // $matrimonios = Matrimonio::paginate();
        $matrimonios = Matrimonio::orderBy('created_at', 'desc')->paginate();

        return view('matrimonio.index', compact('matrimonios'))
            ->with('i', (request()->input('page', 1) - 1) * $matrimonios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $matrimonio = new Matrimonio();
        $esposos = Esposo::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(husNombre, ' ', husApellido)"), 'id');
        $esposas=Esposa::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(wifNombre, ' ', wifApellido)"), 'id');
        $padrinos=Padrino::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padrNombre, ' ', padrApellido)"), 'id');
        $madrinas=Madrina::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madrNombre, ' ', madrApellido)"), 'id');
        $parrocos=Parroco::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(parrNombre, ' ', parrApellido)"), 'id');
        return view('matrimonio.create', compact('matrimonio','esposos','esposas','padrinos','madrinas','parrocos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Matrimonio::$rules);

        $matrimonio = Matrimonio::create($request->all());

        return redirect()->route('matrimonios.index')
            ->with('mensaje', 'Matrimonio creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matrimonio = Matrimonio::find($id);

        return view('matrimonio.show', compact('matrimonio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matrimonio = Matrimonio::find($id);
        $esposos = Esposo::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(husNombre, ' ', husApellido)"), 'id');
        $esposas=Esposa::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(wifNombre, ' ', wifApellido)"), 'id');
        $padrinos=Padrino::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padrNombre, ' ', padrApellido)"), 'id');
        $madrinas=Madrina::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madrNombre, ' ', madrApellido)"), 'id');
        $parrocos=Parroco::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(parrNombre, ' ', parrApellido)"), 'id');

        return view('matrimonio.edit', compact('matrimonio','esposos','esposas','padrinos','madrinas','parrocos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Matrimonio $matrimonio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matrimonio $matrimonio)
    {
        request()->validate(Matrimonio::$rules);

        $matrimonio->update($request->all());

        return redirect()->route('matrimonios.index')
            ->with('mensaje', 'Se ha actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $matrimonio = Matrimonio::find($id)->delete();

        return redirect()->route('matrimonios.index')
            ->with('mensaje', 'Matrimonio eliminado correctamente');
    }
}
