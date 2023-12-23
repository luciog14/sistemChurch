<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Cédula') }}
                    {{ Form::text('bauCedula', $bautizo->bauCedula, [
                        'id' => 'bauCedula',
                        'class' => 'form-control' . ($errors->has('bauCedula') ? ' is-invalid' : ''),
                        'oninput' => 'limitarCaracteres(this, 10)'  // Límite de caracteres establecido en 10
                    ]) }}
                    {!! $errors->first('bauCedula', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <script>
                    function limitarCaracteres(input, maxLength) {
                        if (input.value.length > maxLength) {
                            input.value = input.value.slice(0, maxLength);
                        }
                    }
                </script>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Género') }}
                    {{ Form::text('bauGenero', $bautizo->bauGenero, [
                        'class' => 'form-control' . ($errors->has('bauGenero') ? ' is-invalid' : ''),
                        'placeholder' => 'Ej. Masculino o Femenino']) }}
                    {!! $errors->first('bauGenero', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Estado civil') }}
                    {{ Form::text('bauEstado', $bautizo->bauEstado, ['class' => 'form-control' . ($errors->has('bauEstado') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('bauEstado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Nacionalidad') }}
                    {{ Form::text('bauNacionalidad', $bautizo->bauNacionalidad, ['class' => 'form-control' . ($errors->has('bauNacionalidad') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('bauNacionalidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombres') }}
                    {{ Form::text('bauNombre', $bautizo->bauNombre, ['class' => 'form-control' . ($errors->has('bauNombre') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('bauNombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Apellidos') }}
                    {{ Form::text('bauApellido', $bautizo->bauApellido, ['class' => 'form-control' . ($errors->has('bauApellido') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('bauApellido', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Fecha de Nacimiento') }}
                    {{ Form::date('bauFechaNac', $bautizo->bauFechaNac, ['class' => 'form-control' . ($errors->has('bauFechaNac') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('bauFechaNac', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    {{ Form::label('Lugar de Nacimiento') }}
                    {{ Form::text('bauLugarNac', $bautizo->bauLugarNac, ['class' => 'form-control' . ($errors->has('bauLugarNac') ? ' is-invalid' : ''), 'placeholder' => 'Ej. Ecuador/El Oro/Pasaje/Progreso']) }}
                    {!! $errors->first('bauLugarNac', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Fecha de Registro') }}
                    {{ Form::date('bauFechaReg', $bautizo->bauFechaReg, ['class' => 'form-control' . ($errors->has('bauFechaReg') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('bauFechaReg', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    {{ Form::label('Lugar de Registro') }}
                    {{ Form::text('bauLugarReg', $bautizo->bauLugarReg, ['class' => 'form-control' . ($errors->has('bauLugarReg') ? ' is-invalid' : ''), 'placeholder' => 'Ej. Ecuador/El Oro/Pasaje/Pasaje']) }}
                    {!! $errors->first('bauLugarReg', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombres del Padre') }}
                    {{ Form::select('bauPadreId',$padres, $bautizo->bauPadreId, ['class' => 'form-control' . ($errors->has('bauPadreId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Padre']) }}
                    {!! $errors->first('bauPadreId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                    </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombres de la madre') }}
                    {{ Form::select('bauMadreId',$madres, $bautizo->bauMadreId, ['class' => 'form-control' . ($errors->has('bauMadreId') ? ' is-invalid' : ''), 'placeholder' => 'Nombres de la madre']) }}
                    {!! $errors->first('bauMadreId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombres del Padrino') }}
                    {{ Form::select('bauPadrinoId',$padrinos, $bautizo->bauPadrinoId, ['class' => 'form-control' . ($errors->has('bauPadrinoId') ? ' is-invalid' : ''), 'placeholder' => 'Nombres del padrino']) }}
                    {!! $errors->first('bauPadrinoId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombres de la Madrina') }}
                    {{ Form::select('bauMadrinaId',$madrinas, $bautizo->bauMadrinaId, ['class' => 'form-control' . ($errors->has('bauMadrinaId') ? ' is-invalid' : ''), 'placeholder' => 'Nombres de la madrina']) }}
                    {!! $errors->first('bauMadrinaId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="form-group">
                        {{ Form::label('Fecha de Bautismo') }}
                        {{ Form::date('bauFechaBautismo', $bautizo->bauFechaBautismo, ['class' => 'form-control' . ($errors->has('bauFechaBautismo') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('bauFechaBautismo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Registro Civil') }}
                    {{ Form::text('bauRegCivil', $bautizo->bauRegCivil, ['class' => 'form-control' . ($errors->has('bauRegCivil') ? ' is-invalid' : ''), 'placeholder' => 'Ej. Tomo/Pagina/Acta']) }}
                    {!! $errors->first('bauRegCivil', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Registro Eclesiastico') }}
                    {{ Form::text('bauRegEcles', $bautizo->bauRegEcles, ['class' => 'form-control' . ($errors->has('bauRegEcles') ? ' is-invalid' : ''), 'placeholder' => 'Ej. Tomo/Pagina/Acta']) }}
                    {!! $errors->first('bauRegEcles', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombres del Párroco') }}
                    {{ Form::select('bauParrocoId',$parrocos, $bautizo->bauParrocoId, ['class' => 'form-control' . ($errors->has('bauParrocoId') ? ' is-invalid' : ''), 'placeholder' => 'Nombres del Párroco']) }}
                    {!! $errors->first('bauParrocoId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <hr>
    <div class="row">
        <div class="col-md-12 text-right">
            <div class="form-group">
                <a href="{{ route('bautizos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>
