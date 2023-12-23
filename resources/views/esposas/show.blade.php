@extends('layouts.admin')

@section('contenido')
<div class="container-fluid" style="width: 60%">
<center><H2>Datos de la Esposa</H2></center>
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
                            <a href="{{url('esposas')}}" class="btn btn-info">
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
                                        <label for="wifCedula">Cedula</label><b>*</b>
                                        <input name="wifCedula" value="{{$esposa->wifCedula}}" type="number" class="form-control" disabled>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="wifTelefono">Teléfono</label><b>*</b>
                                        <input name="wifTelefono" value="{{$esposa->wifTelefono}}" type="number" class="form-control" disabled>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="wifNombre">Nombres</label><b>*</b>
                                        <input name="wifNombre" value="{{$esposa->wifNombre}}" type="text" class="form-control" disabled>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="wifApellido">Apellidos</label><b>*</b>
                                        <input name="wifApellido" value="{{$esposa->wifApellido}}" type="text" class="form-control" disabled>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="wifEmail">Correo</label><b>*</b>
                                        <input name="wifEmail" value="{{$esposa->wifEmail}}" type="text" class="form-control" disabled>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="wifDireccion">Dirección</label><b>*</b>
                                        <input name="wifDireccion" value="{{$esposa->wifDireccion}}" type="text" class="form-control" disabled>                                        
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