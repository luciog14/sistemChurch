@extends('layouts.admin')

@section('contenido')
<div class="container-fluid" style="width: 60%">
<center><H2>Datos de la Madrina</H2></center>
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
                        <h3 class="card-title "><b>Datos registrados</b></h3>
                        <div class="card-tools">
                            <a href="{{url('madrinas')}}" class="btn btn-info">
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
                                        <label for="madrCedula">Cedula</label><b>*</b>
                                        <input name="madrCedula" value="{{$madrina->madrCedula}}" type="number" class="form-control" disabled>
                                        <!-- @error('docNumero')
                                            <small style="color:red">* Este campo es requerido</small>
                                        @enderror -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="madrTelefono">Teléfono</label><b>*</b>
                                        <input name="madrTelefono" value="{{$madrina->madrTelefono}}" type="number" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madrNombre">Nombres</label><b>*</b>
                                        <input name="madrNombre" value="{{$madrina->madrNombre}}" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madrApellido">Apellidos</label><b>*</b>
                                        <input name="madrApellido" value="{{$madrina->madrApellido}}" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="madrDireccion">Dirección</label><b>*</b>
                                        <input name="madrDireccion" value="{{$madrina->madrDireccion}}" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- <hr>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <a href="" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-info">Guardar Documento</button>
                                    </div>
                                </div>
                            </div>
                        </form> -->
                        <!--fin de formulario  -->
                    </div><!--fin de card-body-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
