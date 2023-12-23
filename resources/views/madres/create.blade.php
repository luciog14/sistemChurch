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
                        <h3 class="card-title "><b>Registrar datos de la madre</b></h3>

                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->
                        <form action="{{url('madres')}}" method="post" enctype="multipart/form-data" class="">
                        @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="madCedPas">Cédula</label><b>*</b>
                                        <input name="madCedPas" oninput="limitarCaracteres(this, 10)" value="{{old('madCedPas')}}" type="number" class="form-control" required>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                        <script>
                                            function limitarCaracteres(input, maxLength) {
                                                if (input.value.length > maxLength) {
                                                    input.value = input.value.slice(0, maxLength);
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="madTelefono">Teléfono</label><b>*</b>
                                        <input name="madTelefono" value="{{old('madTelefono')}}" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="madNacionalidad">Nacionalidad</label><b>*</b>
                                        <input name="madNacionalidad" value="{{old('madNacionalidad')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madNombre">Nombres</label><b>*</b>
                                        <input name="madNombre" value="{{old('madNombre')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madApellido">Apellidos</label><b>*</b>
                                        <input name="madApellido" value="{{old('madApellido')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madEmail">Correo</label><b>*</b>
                                        <input name="madEmail" value="{{old('madEmail')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madDireccion">Dirección</label><b>*</b>
                                        <input name="madDireccion" value="{{old('madDireccion')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <a href="{{url('madres')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-info">Guardar</button>
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
