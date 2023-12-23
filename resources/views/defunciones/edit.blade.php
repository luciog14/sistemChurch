@extends('layouts.admin')

@section('contenido')
<div class="container-fluid" style="width: 60%" >
<br><center><h4>Actualizar datos de defunciones</h4></center>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card shadow mt-3 card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title "><b>Llene los datos de Defunción</b></h3>
                        <div class="card-tools">
                            <a href="{{url('defunciones')}}" class="btn btn-success">
                            <ion-icon name="arrow-redo-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->
                        <form action="{{url('defunciones',$defuncion->id)}}" method="post" enctype="multipart/form-data" class="">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="defCedula">Cédula</label><b>*</b>
                                        <input name="defCedula" value="{{$defuncion->defCedula}}" type="number" class="form-control" required>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="defNombre">Nombres</label><b>*</b>
                                        <input name="defNombre" value="{{$defuncion->defNombre}}" type="text" class="form-control" required>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="defApellido">Apellidos</label><b>*</b>
                                        <input name="defApellido" value="{{$defuncion->defApellido}}" type="text" class="form-control" required>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="defRegistro">Nombre de quien Registra</label><b>*</b>
                                        <input name="defRegistro" value="{{$defuncion->defRegistro}}" type="text" class="form-control" required>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <a href="" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar Registro</button>
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