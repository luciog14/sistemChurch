@extends('layouts.admin')

@section('contenido')

    <div class="container-fluid" style="width: 80%;">
    <center><h2>Datos del usuario</h2></center>
        @if($message=Session::get('mensaje'))
            <script>
                Swal.fire({
                    title: "Excelente!",
                    text: "{{$message}}",
                    icon: "success"
                });
            </script>
        @endif
        <div class="row ">
            <div class="col-md-12">
                <div class="card shadow mt-3 card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title "><b>Vista de datos</b></h3>
                        <div class="card-tools">
                            <a href="{{ url('usuarios') }}" class="btn btn-primary">
                            <ion-icon name="chevron-back-outline"></ion-icon>&nbsp; Regresar
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                      
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-3 col-form-label text-md-end">Nombre</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" value="{{$usuario->name}}" disabled autofocus>

                                   
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-3 col-form-label text-md-end">Email</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" value="{{$usuario->email}}" disabled>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-3 col-form-label text-md-end">Fecha de ingreso</label>

                                <div class="col-md-8">
                                    <input id="password" type="text" class="form-control" value="{{$usuario->fechaIngreso}}" disabled>

                                   
                                </div>
                            </div>

                            
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
