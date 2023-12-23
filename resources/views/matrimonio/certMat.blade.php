<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <title>Certificado de Confirmación</title>
    <link rel="icon" href="{{ asset('images/ico/favicon.ico') }}" type="image/x-icon">
    <style> body {display: flex;flex-direction: column;min-height: 100vh;margin: 0;}h2,h3 {margin: 0;padding: 0;}.header {text-align: center;margin-top: 50px;}.body-content {padding: 20px;}p {line-height: 2;text-align: justify;}.encabezado {text-align: center;}.footer {padding: 10px;text-align: center;position: fixed;bottom: 0;width: 100%;}.fecha {margin-top: 180px;text-align: right;}@page {margin: 20mm 25mm 25mm 25mm;}</style>
</head>

<body>
    @php
    // Divide la cadena en partes usando el delimitador '/'
        $partes = explode('/', $matrimonio->matRegistroEclesiastico);
        // Asigna cada parte a una variable
        $tomo = $partes[0];
        $pagina = $partes[1];
        $acta = $partes[2];

        $RegCiv = explode('/', $matrimonio->matRegistroCivil);
        $tomoCiv = $RegCiv[0];
        $paginaCiv = $RegCiv[1];
        $actaCiv = $RegCiv[2];
        @endphp

    <!-- Encabezado -->
    <div class="encabezado">
        <p><h2>PARROQUIA ECLESIÁSTICA DE PASAJE</h2>
        <h3>DIÓCESIS DE MACHALA</h3>
        Teléfono: (07)2915-160<br>
        Email: iglesiaparroquialdepasaje@gmail.com <br>
        Dir. Calle Sucre y Municipalidad</p>
    </div>

    <!-- Cuerpo del certificado -->
    <div class="header">
        <h2>CERTIFICADO DE MATRIMONIO ECLESIÁSTICO</h2>
    </div>
    <div class="body-content">
        <p class="overflow-auto">
            <b>Nombre de los contrayentes:</b><br>
            Sr. {{ $matrimonio->esposo->husNombre }} {{ $matrimonio->esposo->husApellido }}.<br>
            Sra. {{ $matrimonio->esposa->wifNombre }} {{ $matrimonio->esposa->wifApellido }}.<br>
            <b>Fecha de matrimonio:</b> {{$matrimonio->matFechaRegistro}}.<br>
            <b>Padrinos:</b> @if ($matrimonio->padrino) {{$matrimonio->padrino->padrNombre}} {{ $matrimonio->padrino->padrApellido }}, @else NN, @endif y @if ($matrimonio->madrina) {{$matrimonio->madrina->madrNombre}} {{ $matrimonio->madrina->madrApellido }}. @else NN. @endif
        </p>
        <p>Confirió el sacramento: <b>{{ $matrimonio->parroco->parrNombre }} {{ $matrimonio->parroco->parrApellido }}.</b><br>
        Registro Eclesiástico: Tomo: <b>{{$tomo}}</b> - Pagina: <b>{{$pagina}}</b> - Acta: <b>{{$acta}}.</b> </p>
        Registro Civil: Tomo: <b>{{$tomoCiv}}</b> - Pagina: <b>{{$paginaCiv}}</b> - Acta: <b>{{$actaCiv}}.</b> </p>
        <div class="row">
            <div class="col-sm-12">
                <div class="fecha">
                    Pasaje, {{ \Carbon\Carbon::now()->isoFormat('MMMM D [del] YYYY', 'Do [de] MMMM [del] YYYY', 'es') }}.
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <div class="footer">
        @if($idUsuario == '1')
        {{ $nombreUsuario }}
        <h3>PARROCO</h3>
        @endif
        @if($idUsuario == '2')
        {{ $nombreUsuario }}
        <h3>SECRETARIA</h3>
        @endif
    </div>
</body>

</html>
