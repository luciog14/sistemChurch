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
                <div class="card shadow mt-1 card card-outline card-primary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Registro de confirmaciones
                            </span>

                             <div class="float-right">
                                <a href="{{ route('confirmaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear Nueva Confirmación
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover table-sm">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Cédula</th>
										<th>Nombre y apellido</th>
										<th>Padrino</th>
										<th>Madrina</th>
										<th>Parroco</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($confirmaciones as $confirmacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $confirmacione->confCedula }}</td>
											<td>{{ $confirmacione->confNombre }} {{ $confirmacione->confApellido }}</td>
											<td>
                                                @if ($confirmacione->padrino)
                                                    {{ $confirmacione->padrino->padrNombre }} {{ $confirmacione->padrino->padrApellido }}
                                                @else
                                                    Sin padrino
                                                @endif
                                            </td>

                                            <td>
                                                @if ($confirmacione->madrina)
                                                    {{ $confirmacione->madrina->madrNombre }} {{ $confirmacione->madrina->madrApellido }}
                                                @else
                                                    Sin madrina
                                                @endif
                                            </td>

                                            <td>
                                                @if ($confirmacione->parroco)
                                                    {{ $confirmacione->parroco->parrNombre }} {{ $confirmacione->parroco->parrApellido }}
                                                @else
                                                    Sin párroco
                                                @endif
                                            </td>

                                            <td style="text-align:center">
                                                <form action="{{ route('confirmaciones.destroy',$confirmacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-secondary" href="{{ route('confirmaciones.certConfir', $confirmacione->id) }}"><i class="bi bi-printer-fill"></i></a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('confirmaciones.show',$confirmacione->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('confirmaciones.edit',$confirmacione->id) }}"><i class="bi bi-pencil"></i></a>
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Confirmaciones",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Confirmaciones",
                                        "infoFiltered": "(Filtrado de _MAX_ total Confirmaciones)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Confirmaciones",
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
                {!! $confirmaciones->links() !!}
            </div>
        </div>
    </div>
</section>

@endsection
