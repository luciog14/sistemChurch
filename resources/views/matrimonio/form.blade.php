<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Fecha de Registro') }}
                    {{ Form::date('matFechaRegistro', $matrimonio->matFechaRegistro, ['class' => 'form-control' . ($errors->has('matFechaRegistro') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('matFechaRegistro', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Registro Eclesiastico') }}
                    {{ Form::text('matRegistroEclesiastico', $matrimonio->matRegistroEclesiastico, ['class' => 'form-control' . ($errors->has('matRegistroEclesiastico') ? ' is-invalid' : ''), 'placeholder' => 'Ej. Tomo/Pagina/Acta']) }}
                    {!! $errors->first('matRegistroEclesiastico', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Registro Civil') }}
                    {{ Form::text('matRegistroCivil', $matrimonio->matRegistroCivil, ['class' => 'form-control' . ($errors->has('matRegistroCivil') ? ' is-invalid' : ''), 'placeholder' => 'Ej. Tomo/Pagina/Acta']) }}
                    {!! $errors->first('matRegistroEclesiastico', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombre del Esposo') }}
                    {{ Form::select('matEsposoId',$esposos, $matrimonio->matEsposoId, ['class' => 'form-control' . ($errors->has('matEsposoId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Esposo']) }}
                    {!! $errors->first('matEsposoId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombre de la Esposa') }}
                    {{ Form::select('matEsposaId',$esposas, $matrimonio->matEsposaId, ['class' => 'form-control' . ($errors->has('matEsposaId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Esposa']) }}
                    {!! $errors->first('matEsposaId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombre del Padrino') }}
                    {{ Form::select('matPadrinoId',$padrinos, $matrimonio->matPadrinoId, ['class' => 'form-control' . ($errors->has('matPadrinoId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Padrino']) }}
                    {!! $errors->first('matPadrinoId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombre de la Madrina') }}
                    {{ Form::select('matMadrinaId',$madrinas, $matrimonio->matMadrinaId, ['class' => 'form-control' . ($errors->has('matMadrinaId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Madrina']) }}
                    {!! $errors->first('matMadrinaId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Nombre del Parroco') }}
                    {{ Form::select('matParrocoId',$parrocos, $matrimonio->matParrocoId, ['class' => 'form-control' . ($errors->has('matParrocoId') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Parroco']) }}
                    {!! $errors->first('matParrocoId', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 text-right">
            <div class="form-group">
                <a href="{{ route('matrimonios.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>
