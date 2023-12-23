@extends('layouts.admin')

@section('contenido')
<div class="container-fluid" style="width: 60%">
    @if($message=Session::get('validarCedula'))
        <script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{$message}}",
            footer: '<a href=""></a>'
            });
        </script>
    @endif

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
                        <h3 class="card-title ">Datos de <b>{{$madre->madNombre}} {{$madre->madApellido}}</b></h3>
                        <div class="card-tools">
                            <a href="{{url('madres')}}" class="btn btn-info">
                            <ion-icon name="arrow-redo-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->

                        @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="madCedPas">Cédula</label><b>*</b>
                                        <input name="madCedPas" value="{{$madre->madCedPas}}" type="number" class="form-control" disabled>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="madTelefono">Teléfono</label><b>*</b>
                                        <input name="madTelefono" value="{{$madre->madTelefono}}" type="number" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="madNacionalidad">Nacionalidad</label><b>*</b>
                                        <input name="madNacionalidad" value="{{$madre->madNacionalidad}}" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madNombre">Nombres</label><b>*</b>
                                        <input name="madNombre" value="{{$madre->madNombre}}" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madApellido">Apellidos</label><b>*</b>
                                        <input name="madApellido" value="{{$madre->madApellido}}" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madEmail">Correo</label><b>*</b>
                                        <input name="madEmail" value="{{$madre->madEmail}}" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madDireccion">Dirección</label><b>*</b>
                                        <input name="madDireccion" value="{{$madre->madDireccion}}" type="text" class="form-control" disabled>
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
