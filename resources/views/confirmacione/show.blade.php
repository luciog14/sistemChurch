@extends('layouts.admin')



@section('contenido')
    <section class="content container-fluid" style="width: 50%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-3 card card-outline card-info">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Datos de confirmación de <b>{{ $confirmacione->confNombre }} {{ $confirmacione->confApellido }}</b></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-info" href="{{ route('confirmaciones.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body ml-4">
                        
                        <div class="form-group">
                            <strong>Cédula:</strong>
                            {{ $confirmacione->confCedula }}
                        </div>
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $confirmacione->confNombre }} 
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $confirmacione->confApellido }}
                        </div>
                        <div class="form-group">
                            <strong>Madre:</strong>
                            @if ($confirmacione->madre)
                                {{ $confirmacione->madre->madNombre }}  {{ $confirmacione->madre->madApellido }}
                            @else
                                NN
                            @endif
                            
                        </div>
                        <div class="form-group">
                            <strong>Padre:</strong>
                            @if ($confirmacione->padre)
                                {{ $confirmacione->padre->padNombre }}  {{ $confirmacione->padre->padApellido }}
                            @else
                                NN
                            @endif
                            
                        </div>
                        
                        <div class="form-group">
                            <strong>Padrino:</strong>
                            @if ($confirmacione->padrino)
                                {{ $confirmacione->padrino->padrNombre }}  {{ $confirmacione->padrino->padrApellido }}
                            @else
                                Sin Padrino
                            @endif
                            
                        </div>
                        <div class="form-group">
                            <strong>Madrina:</strong>
                            @if ($confirmacione->madrina)
                                {{ $confirmacione->madrina->madrNombre }}  {{ $confirmacione->madrina->madrApellido }}
                            @else
                                Sin Madrina
                            @endif
                            
                        </div>
                        <div class="form-group">
                            <strong>Parroco:</strong>
                            {{ $confirmacione->parroco->parrNombre }}  {{ $confirmacione->parroco->parrApellido }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Registro:</strong>
                            {{ $confirmacione->confFechaRegistro }}
                        </div>
                        <div class="form-group">
                            <strong>Registro Eclesiastico:</strong>
                            {{ $confirmacione->confRegistroEclesiastico }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
