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
                        <h3 class="card-title ">Actualizar datos de<b> {{$padre->padNombre}} {{$padre->padApellido}}</b></h3>
                        <div class="card-tools">
                            <a href="{{url('padres')}}" class="btn btn-info">
                            <ion-icon name="arrow-redo-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->
                        <form action="{{url('padres',$padre->id)}}" method="post" enctype="multipart/form-data" class="">
                        @csrf
                        {{method_field('PATCH')}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="padCedPas">Cédula</label><b>*</b>
                                        <input name="padCedPas" value="{{$padre->padCedPas}}" type="number" class="form-control" required>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="padTelefono">Teléfono</label><b>*</b>
                                        <input name="padTelefono" value="{{$padre->padTelefono}}" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="padNacionalidad">Nacionalidad</label><b>*</b>
                                        <input name="padNacionalidad" value="{{$padre->padNacionalidad}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="padNombre">Nombres</label><b>*</b>
                                        <input name="padNombre" value="{{$padre->padNombre}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="padApellido">Apellidos</label><b>*</b>
                                        <input name="padApellido" value="{{$padre->padApellido}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="padEmail">Correo</label><b>*</b>
                                        <input name="padEmail" value="{{$padre->padEmail}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="padDireccion">Dirección</label><b>*</b>
                                        <input name="padDireccion" value="{{$padre->padDireccion}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <a href="" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-info">Guardar Registro</button>
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
