@extends('layouts.admin')
@section('contenido')
<section class="content">
    @if($message=Session::get('mensaje'))
        <script>
            Swal.fire({
                title: "Excelente!",
                text: "{{$message}}",
                icon: "success"
            });
        </script>
    @endif
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
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="bi bi-person-standing-dress"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-center">Datos de la Madre</span>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('madres/create')}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-floppy2-fill"></i></a>
                        <a href="{{url('madres')}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div>

            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="bi bi-person-standing"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-center">Datos del Padre</span>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{url('padres/create')}}" type="button" class="btn btn-primary btn-sm"><i class="bi bi-floppy2-fill"></i></a>
                            <a href="{{url('padres')}}" type="button" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1">
                        <ion-icon name="woman-outline"></ion-icon></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-center">Datos de Madrina</span>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{url('madrinas/create')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-floppy2-fill"></i></a>
                            <a href="{{url('madrinas')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-dark elevation-1"><ion-icon name="man-outline"></ion-icon></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-center">Datos de Padrino</span>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{url('padrinos/create')}}" type="button" class="btn btn-dark btn-sm"><i class="bi bi-floppy2-fill"></i></a>
                            <a href="{{url('padrinos')}}" type="button" class="btn btn-dark btn-sm"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Registro de Bautizos
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bautizos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear Nuevo Bautizo
                                </a>
                              </div>
                        </div>
                    </div>
                    <!-- @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif -->

                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover table-sm">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Cédula</th>
										<th>Nombre y Apellido</th>
										<th>Padre</th>
										<th>Madre</th>
										<th>Párroco</th>

                                        <th style="text-align: center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bautizos as $bautizo)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $bautizo->bauCedula }}</td>
											<td>{{ $bautizo->bauNombre }} {{ $bautizo->bauApellido }}</td>
											<td>
                                                @if ($bautizo->padre)
                                                    {{ $bautizo->padre->padNombre }} {{ $bautizo->padre->padApellido }}
                                                @else
                                                    Sin padrino
                                                @endif
                                            </td>
											<td>
                                                @if ($bautizo->madre)
                                                    {{ $bautizo->madre->madNombre }} {{ $bautizo->madre->madApellido }}
                                                @else
                                                    Sin padrino
                                                @endif
                                            </td>
											<td>{{ $bautizo->parroco->parrNombre }} {{ $bautizo->parroco->parrApellido }}</td>

                                            <td style="text-align:center">
                                                <form action="{{ route('bautizos.destroy',$bautizo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-secondary" href="{{ route('bautizos.certificadoBautismo', $bautizo->id) }}"><i class="bi bi-printer-fill"></i></a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bautizos.show',$bautizo->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bautizos.edit',$bautizo->id) }}"><i class="bi bi-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <script>
                                $(function () {
                                    $("#example1").DataTable({

                                        "pageLength": 10,
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Bautizos",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Bautizos",
                                            "infoFiltered": "(Filtrado de _MAX_ total Bautizos)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Bautizos",
                                            "loadingRecords": "Cargando...",
                                            "processing": "Procesando...",
                                            "search": "Buscador:",
                                            "zeroRecords": "Sin resultados encontrados",
                                            "paginate": {
                                                "first": "Primero",
                                                "last": "Ultimo",
                                                "next": "Siguiente",
                                                "previous": "Anterior"
                                            }
                                        },
                                        "responsive": true, "lengthChange": true, "autoWidth": false,
                                        buttons: [{
                                            extend: 'collection',
                                            text: 'Reportes',
                                            orientation: 'landscape',
                                            buttons: [{
                                                text: 'Copiar',
                                                extend: 'copy',
                                            }, {
                                                extend: 'pdf'
                                            },{
                                                extend: 'csv'
                                            },{
                                                extend: 'excel'
                                            },{
                                                text: 'Imprimir',
                                                extend: 'print'
                                            }
                                            ]
                                        },
                                            {
                                                extend: 'colvis',
                                                text: 'Visor de columnas',
                                                collectionLayout: 'fixed three-column'
                                            }
                                        ],
                                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                                });
                            </script>
                        </div>
                    </div>
                </div>
                {!! $bautizos->links() !!}
            </div>
        </div>
    </div>
</section>

@endsection
