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
                    <span class="info-box-text text-center">Datos de la Esposa</span>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('esposas/create')}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-floppy2-fill"></i></a>
                        <a href="{{url('esposas')}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div>

            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="bi bi-person-standing"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-center">Datos del Esposo</span>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{url('esposos/create')}}" type="button" class="btn btn-primary btn-sm"><i class="bi bi-floppy2-fill"></i></a>
                            <a href="{{url('esposos')}}" type="button" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
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
                                Listado de Matrimonios
                            </span>

                             <div class="float-right">
                                <a href="{{ route('matrimonios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear Nuevo Matrimonio
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


										<th>Nombres del Esposo</th>
										<th>Nombres de la Esposa</th>
										<th>Padrino</th>
										<th>Madrina</th>
										<th>Parroco</th>

                                        <th style="text-align:center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matrimonios as $matrimonio)
                                        <tr>
                                            <td>{{ ++$i }}</td>


											<td>{{ $matrimonio->esposo->husNombre }} {{ $matrimonio->esposo->husApellido }}</td>

											<td>{{ $matrimonio->esposa->wifNombre }} {{ $matrimonio->esposa->wifApellido }}</td>
											<td>
                                                @if ($matrimonio->padrino)
                                                    {{ $matrimonio->padrino->padrNombre }} {{ $matrimonio->padrino->padrApellido }}
                                                @else
                                                    Sin Padrino
                                                @endif
                                            </td>
											<td>
                                                 @if ($matrimonio->madrina)
                                                 {{ $matrimonio->madrina->madrNombre }} {{ $matrimonio->madrina->madrApellido }}
                                                @else
                                                    Sin Madrina
                                                @endif
                                            </td>
											<td>{{ $matrimonio->parroco->parrNombre }} {{ $matrimonio->parroco->parrApellido }}</td>


                                            <td style="text-align:center">
                                                <form action="{{ route('matrimonios.destroy',$matrimonio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-secondary" href="{{ route('matrimonios.certMat', $matrimonio->id) }}"><i class="bi bi-printer-fill"></i></a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('matrimonios.show',$matrimonio->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('matrimonios.edit',$matrimonio->id) }}"><i class="bi bi-pencil"></i></a>
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Matrimonios",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Matrimonios",
                                        "infoFiltered": "(Filtrado de _MAX_ total Matrimonios)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Matrimonios",
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
                {!! $matrimonios->links() !!}
            </div>
        </div>

    </div>
</section>

@endsection
