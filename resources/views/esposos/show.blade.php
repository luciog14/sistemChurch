@extends('layouts.admin')

@section('contenido')
<div class="container-fluid" style="width: 60%">
<center><H2>Datos del Esposo</H2></center>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach
    <div class="row ">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card shadow mt-3 card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title "><b>Datos Registrados</b></h3>
                        <div class="card-tools">
                            <a href="{{url('esposos')}}" class="btn btn-info">
                            <ion-icon name="arrow-redo-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->
                      
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="husCedula">Cedula</label><b>*</b>
                                        <input name="husCedula" value="{{$esposo->husCedula}}" type="number" class="form-control" disabled>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="husTelefono">Teléfono</label><b>*</b>
                                        <input name="husTelefono" value="{{$esposo->husTelefono}}" type="number" class="form-control" disabled>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="husNombre">Nombres</label><b>*</b>
                                        <input name="husNombre" value="{{$esposo->husNombre}}" type="text" class="form-control" disabled>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="husApellido">Apellidos</label><b>*</b>
                                        <input name="husApellido" value="{{$esposo->husApellido}}" type="text" class="form-control" disabled>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="husEmail">Correo</label><b>*</b>
                                        <input name="husEmail" value="{{$esposo->husEmail}}" type="text" class="form-control" disabled>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="husDireccion">Dirección</label><b>*</b>
                                        <input name="husDireccion" value="{{$esposo->husDireccion}}" type="text" class="form-control" disabled>                                        
                                    </div>
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