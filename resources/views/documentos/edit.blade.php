@extends('layouts.admin')

@section('contenido')
<div class="container-fluid" style="width: 90%">
    <center><h3>Actualizar datos del documento</h3></center>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach
    <div class="row ">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card shadow mt-3 card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title "><b>Llene los datos</b></h3>
                        <div class="card-tools">
                            <a href="{{url('documentos')}}" class="btn btn-primary">
                            <ion-icon name="arrow-redo-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->
                        <form action="{{url('documentos',$documento->id)}}" method="post" enctype="multipart/form-data" class="">
                        @csrf
                        {{method_field('PATCH')}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="docNumero">Nro Documento</label><b>*</b>
                                                    <input name="docNumero" value="{{$documento->docNumero}}" type="number" class="form-control" required>
                                                    <!-- @error('docNumero')
                                                        <small style="color:red">* Este campo es requerido</small>
                                                    @enderror -->
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Fecha de Emision</label><b>*</b>
                                                    <input name="docFechEmision" value="{{$documento->docFechEmision}}" type="date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                                    <label for="">Registro físico</label><b>*</b>
                                                    <input name="docLibro" value="{{$documento->docLibro}}" type="text" class="form-control" placeholder="Ej. Libro/pagina" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="docRemit">Remitente</label><b>*</b>
                                                <input name="docRemit" value="{{$documento->docRemit}}" type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <label for="">Destinatario</label><b>*</b>
                                                <input name="docDest" value="{{$documento->docDest}}" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="docNumero">Asunto</label><b>*</b>
                                                <input name="docAsunto" value="{{$documento->docAsunto}}" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Subir Archivo</label><b>*</b>
                                                <input name="docEscan" value="{{$documento->docEscan}}" type="file" id="file" class="form-control" required>
                                                <script>
                                                    function archivo(evt){
                                                        var files = evt.target.files;
                                                        //obtenemos la imagen del campo "file".
                                                        for (var i=0, f; f = files[i]; i++){
                                                            //solo admitimos imagenes.
                                                            if (!f.type.match('image.*')){
                                                                continue;
                                                            }
                                                            var reader = new FileReader();
                                                            reader.onload = (function (theFile){
                                                                return function (e){
                                                                    //insertamos la imagen
                                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result,'"width="25%" title="', escape(theFile.name),'"/>'].join('');
                                                                };
                                                            }) (f);
                                                            reader.readAsDataURL(f);
                                                        }
                                                    }
                                                    document.getElementById('file').addEventListener('change',archivo, false);
                                                </script>					
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row justify-content-center" >
                                        <!-- script aquí -->
                                        <center>
                                        <output id="list" class="mx-auto">
                                            <div>
                                                @if($documento->docEscan == '')
                                                    <img src="{{ url('images/imgNot.jpg') }}" width="200px" alt="">
                                                @else
                                                    <img src="{{ asset('storage/' . $documento->docEscan) }}" width="200px" alt="">
                                                @endif
                                            </div>
                                        </output>
                                        </center>
                                    </div>
                                    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <a href="" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar Documento</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--fin de formulario  -->
                    </div><!--fin de card-body-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection