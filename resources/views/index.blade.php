@extends('layouts.admin')

@section('contenido')
<br>
<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
            <?php $contadorBautizos = 0; ?>
                @foreach($bautizos as $bautizo)
                    <?php $contadorBautizos++; ?>
                @endforeach
                <h3><?= $contadorBautizos ?></h3>
                <p>Bautizos</p>
            </div>
            <div class="icon">
                <i class="nav-icon fa fa-dove"></i>
            </div>
            <a href="{{url('bautizos')}}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <?php $contadorConfirmaciones = 0; ?>
                @foreach($confirmaciones as $confirmacion)
                    <?php $contadorConfirmaciones++; ?>
                @endforeach
                <h3><?= $contadorConfirmaciones ?></h3>
                <p>Confirmaciones</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-child"></i>
            </div>
            <a href="{{url('confirmaciones')}}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
            <?php $contadorMatrimonios = 0; ?>
                @foreach($matrimonios as $matrimonio)
                    <?php $contadorMatrimonios++; ?>
                @endforeach
                <h3><?= $contadorMatrimonios ?></h3>
                <p>Matrimonios</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-file-contract"></i>
            </div>
            <a href="{{url('matrimonios')}}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <?php $contadorDefunciones = 0; ?>
                @foreach($defunciones as $defuncion)
                    <?php $contadorDefunciones++; ?>
                @endforeach
                <h3><?= $contadorDefunciones ?></h3>
                <p>Defunciones</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-cross"></i>
            </div>
            <a href="{{url('defunciones')}}" class="small-box-footer">Mas información<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

@endsection

