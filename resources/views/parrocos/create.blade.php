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
                        <h3 class="card-title "><b>Registrar datos del Parroco</b></h3>
                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->
                        <form action="{{url('parrocos')}}" method="post" enctype="multipart/form-data" class="">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="parrTelefono">Teléfono</label><b>*</b>
                                        <input name="parrTelefono" value="{{old('parrTelefono')}}" type="number" class="form-control" required>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="parrNombre">Nombres</label><b>*</b>
                                        <input name="parrNombre" value="{{old('parrNombre')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="parrApellido">Apellidos</label><b>*</b>
                                        <input name="parrApellido" value="{{old('parrApellido')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="parrParroquia">Parroquia</label><b>*</b>
                                        <input name="parrParroquia" value="{{old('parrParroquia')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <a href="{{url('parrocos')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-info">Guardar Parroco</button>
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
