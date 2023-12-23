<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
            <div class="form-group">
                {{ Form::label('Cédula') }}
                {{ Form::number('confCedula', $confirmacione->confCedula, [
                    'class' => 'form-control' . ($errors->has('confCedula') ? ' is-invalid' : ''),
                    'oninput' => 'limitarCaracteres(this,10)'
                    ]) }}
                {!! $errors->first('confCedula', '<div class="invalid-feedback">:message</div>') !!}
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
                    {{ Form::label('Fecha de Registro') }}
                    {{ Form::date('confFechaRegistro', $confirmacione->confFechaRegistro, ['class' => 'form-control' . ($errors->has('confFechaRegistro') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('confFechaRegistro', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Registro Eclesiastico') }}
                    {{ Form::text('confRegistroEclesiastico', $confirmacione->confRegistroEclesiastico, ['class' => 'form-control' . ($errors->has('confRegistroEclesiastico') ? ' is-invalid' : ''),'placeholder' => 'Ej. Tomo/Página/Acta']) }}
                    {!! $errors->first('confRegistroEclesiastico', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombres') }}
                    {{ Form::text('confNombre', $confirmacione->confNombre, ['class' => 'form-control' . ($errors->has('confNombre') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('confNombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Apellidos') }}
                    {{ Form::text('confApellido', $confirmacione->confApellido, ['class' => 'form-control' . ($errors->has('confApellido') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('confApellido', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Padre') }}
                    {{ Form::select('confPadreId',$padres, $confirmacione->confPadreId, ['class' => 'form-control' . ($errors->has('confPadreId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Padre']) }}
                    {!! $errors->first('confPadreId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Madre') }}
                    {{ Form::select('confMadreId',$madres, $confirmacione->confMadreId, ['class' => 'form-control' . ($errors->has('confMadreId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Madre']) }}
                    {!! $errors->first('confMadreId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Padrino') }}
                    {{ Form::select('confPadrinoId',$padrinos, $confirmacione->confPadrinoId, ['class' => 'form-control' . ($errors->has('confPadrinoId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Padrino']) }}
                    {!! $errors->first('confPadrinoId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Madrina') }}
                    {{ Form::select('confMadrinaId',$madrinas, $confirmacione->confMadrinaId, ['class' => 'form-control' . ($errors->has('confMadrinaId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Madrina']) }}
                    {!! $errors->first('confMadrinaId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Parroco') }}
                    {{ Form::select('confParrocoId',$parrocos, $confirmacione->confParrocoId, ['class' => 'form-control' . ($errors->has('confParrocoId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Parroco']) }}
                    {!! $errors->first('confParrocoId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 text-right">
            <div class="form-group">
                <a href="{{ route('confirmaciones.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>

</div>
