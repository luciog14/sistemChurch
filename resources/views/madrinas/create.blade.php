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
                        <h3 class="card-title "><b>Registrar datos de la madrina</b></h3>
                    </div>
                    <div class="card-body">

                        <!-- inicio de formulario -->
                        <form action="{{url('madrinas')}}" method="post" enctype="multipart/form-data" class="">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="madrCedula">Cedula</label><b>*</b>
                                        <input name="madrCedula" oninput="limitarCaracteres(this, 10)" value="{{old('madrCedula')}}" type="number" class="form-control" required>
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
                                        <label for="madrTelefono">Teléfono</label><b>*</b>
                                        <input name="madrTelefono" value="{{old('madrTelefono')}}" type="number" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madrNombre">Nombres</label><b>*</b>
                                        <input name="madrNombre" value="{{old('madrNombre')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madrApellido">Apellidos</label><b>*</b>
                                        <input name="madrApellido" value="{{old('madrApellido')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madrDireccion">Dirección</label><b>*</b>
                                        <input name="madrDireccion" value="{{old('madrDireccion')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <a href="{{url('madrinas')}}" class="btn btn-secondary">Cancelar</a>
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
