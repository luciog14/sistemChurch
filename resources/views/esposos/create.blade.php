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
                        <h3 class="card-title "><b>Registrar datos del esposo</b></h3>

                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->
                        <form action="{{url('esposos')}}" method="post" enctype="multipart/form-data" class="">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="husCedula">Cedula</label><b>*</b>
                                        <input name="husCedula" oninput="limitarCaracteres(this, 10)" value="{{old('husCedula')}}" type="number" class="form-control" required>
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="husTelefono">Teléfono</label><b>*</b>
                                        <input name="husTelefono" value="{{old('husTelefono')}}" type="number" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="husNombre">Nombres</label><b>*</b>
                                        <input name="husNombre" value="{{old('husNombre')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="husApellido">Apellidos</label><b>*</b>
                                        <input name="husApellido" value="{{old('husApellido')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="husEmail">Correo</label><b>*</b>
                                        <input name="husEmail" value="{{old('husEmail')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="husDireccion">Dirección</label><b>*</b>
                                        <input name="husDireccion" value="{{old('husDireccion')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <a href="{{url('matrimonios')}}" class="btn btn-secondary">Cancelar</a>
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
