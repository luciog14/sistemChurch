@extends('layouts.admin')

@section('contenido')
<div class="container-fluid" style="width: 90%">
    <center><H2>Datos del documento</H2></center>
    
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach
    <div class="row ">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card shadow mt-3 card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title "><b>Datos registrados</b></h3>
                        <div class="card-tools">
                            <a href="{{url('documentos')}}" class="btn btn-primary">
                            <ion-icon name="arrow-redo-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->
                        
                        @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="docNumero">Nro Documento</label><b>*</b>
                                                    <input name="docNumero" value="{{$documento->docNumero}}" type="number" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Fecha de Emision</label><b>*</b>
                                                    <input name="docFechEmision" value="{{$documento->docFechEmision}}" type="date" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                                    <label for="">Registro físico</label><b>*</b>
                                                    <input name="docLibro" value="{{$documento->docLibro}}" type="text" class="form-control" placeholder="Ej. Libro/pagina" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="docRemit">Remitente</label><b>*</b>
                                                <input name="docRemit" value="{{$documento->docRemit}}" type="text" class="form-control" disabled>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <label for="">Destinatario</label><b>*</b>
                                                <input name="docDest" value="{{$documento->docDest}}" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="docNumero">Asunto</label><b>*</b>
                                                <input name="docAsunto" value="{{$documento->docAsunto}}" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <center><label for="">Imagen de documento</label></center>
                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                    <div>
                                    @if($documento->docEscan == '')
                                        <img src="{{ url('images/imgNot.jpg') }}" width="200px" alt="">
                                    @else
                                       
                                            <img src="{{ asset('storage/' . $documento->docEscan) }}" width="200px" alt="">
                                        
                                    @endif
                                    </div></center>
                                    

                                </div>
                            </div>
                            
                        <!--fin de formulario  -->
                    </div><!--fin de card-body-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection