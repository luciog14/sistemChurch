@extends('layouts.admin')
@section('contenido')
    <section class="content container-fluid" style="width: 80%;">
    <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-3 card card-outline card-info">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Vista de Bautizo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bautizos.index') }}">Atras</a>


                        </div>
                    </div>

                    <div class="card-body">
                        <!-- *********************************** -->
                        <div class="box-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <strong>Nro. Cédula:</strong>
                                    {{ $bautizo->bauCedula }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <strong>Género:</strong>
                                    {{ $bautizo->bauGenero }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <strong>Estado civil:</strong>
                                    {{ $bautizo->bauEstado }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <strong>Nacionalidad:</strong>
                                    {{ $bautizo->bauNacionalidad }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Nombres:</strong>
                                    {{ $bautizo->bauNombre }}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Apellidos:</strong>
                                    {{ $bautizo->bauApellido }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Fecha de nacimiento:</strong>
                                    {{ $bautizo->bauFechaNac }}
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <strong>Lugar de nacimiento:</strong>
                                    {{ $bautizo->bauLugarNac }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Fecha de registro:</strong>
                                    {{ $bautizo->bauFechaReg }}
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <strong>Lugar de registro:</strong>
                                    {{ $bautizo->bauLugarReg }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Padre:</strong>
                                    @if ($bautizo->padre)
                                        {{ $bautizo->padre->padNombre }}  {{ $bautizo->padre->padApellido }}
                                    @else
                                        NN
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Madre:</strong>
                                    @if ($bautizo->madre)
                                        {{ $bautizo->madre->madNombre }}  {{ $bautizo->madre->madApellido }}
                                    @else
                                        NN
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Padrino:</strong>
                                    @if ($bautizo->padrino)
                                        {{ $bautizo->padrino->padrNombre }}  {{ $bautizo->padrino->padrApellido }}
                                    @else
                                        NN
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Madrina:</strong>
                                    @if ($bautizo->madrina)
                                        {{ $bautizo->madrina->madrNombre }}  {{ $bautizo->madrina->madrApellido }}
                                    @else
                                        NN
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <strong>Fecha de Bautismo:</strong>
                                        {{ $bautizo->bauFechaBautismo }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Registro Civil:</strong>
                                    {{ $bautizo->bauRegCivil }}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Registro Eclesiastico:</strong>
                                    {{ $bautizo->bauRegEcles }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Nombre de Párroco:</strong>
                                    {{ $bautizo->bauParrocoId }}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
