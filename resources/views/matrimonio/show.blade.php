@extends('layouts.admin')
@section('contenido')
    <section class="content container-fluid" style="width: 50%;">
        <div class="row">
            <div class="col-md-12">
            <div class="card shadow mt-5 card card-outline card-primary">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Datos del Matrimonio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('matrimonios.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha de registro:</strong>
                            {{ $matrimonio->matFechaRegistro }}
                        </div>
                        <div class="form-group">
                            <strong>Registro Eclesiastico:</strong>
                            {{ $matrimonio->matRegistroEclesiastico }}
                        </div>
                        <div class="form-group">
                            <strong>Registro Civil:</strong>
                            {{ $matrimonio->matRegistroCivil }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del Esposo:</strong>
                            {{ $matrimonio->esposo->husNombre }} {{ $matrimonio->esposo->husApellido }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre de la Esposa:</strong>
                            {{ $matrimonio->esposa->wifNombre }} {{ $matrimonio->esposa->wifApellido }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del Padrino:</strong>
                            @if ($matrimonio->padrino)
                                {{ $matrimonio->padrino->padrNombre }} {{ $matrimonio->padrino->padrApellido }}
                            @else
                                Sin Padrino
                            @endif
                            
                        </div>
                        <div class="form-group">
                            <strong>Nombre de la Madrina:</strong>
                            @if ($matrimonio->madrina)
                                {{ $matrimonio->madrina->madrNombre }} {{ $matrimonio->madrina->madrApellido }}
                            @else
                                Sin Madrina
                            @endif
                            <!-- {{ $matrimonio->matMadrinaId }} -->
                        </div>
                        <div class="form-group">
                            <strong>Nombre del Parroco:</strong>
                            {{ $matrimonio->parroco->parrNombre }} {{ $matrimonio->parroco->parrApellido }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
