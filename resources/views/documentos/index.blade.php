@extends('layouts.admin')

@section('contenido')

    <div class="container-fluid">
        @if($message=Session::get('mensaje'))
            <script>
                Swal.fire({
                    title: "Excelente!",
                    text: "{{$message}}",
                    icon: "success"
                });
            </script>
        @endif
        <div class="row ">
            <div class="col-md-12">
                <div class="card shadow mt-3 card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title "><b>Documentos Registrados</b></h3>
                        <div class="card-tools">
                            <a href="{{url('documentos/create')}}" class="btn btn-primary">
                            <i class="bi bi-person-plus-fill"></i>&nbsp; Agregar Nuevo
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nro Doc</th>
                                <th>Fecha Emision</th>
                                <th>Remitente</th>
                                <th>Destinatario</th>
                                <th>Asunto</th>
                                <th>Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador=0; ?>
                            @foreach($documentos as $Documento)
                            <tr>
                                <td><?php echo $contador=$contador+1;?></td>
                                <td>{{$Documento->docNumero}}</td>
                                <td>{{$Documento->docFechEmision}}</td>
                                <td>{{$Documento->docRemit}}</td>
                                <td>{{$Documento->docDest}}</td>
                                <td>{{$Documento->docAsunto}}</td>
                                <td>{{$Documento->docLibro}}</td>
                                <td style="text-align:center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('documentos.edit',$Documento->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <a href="{{url('documentos',$Documento->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                    <form action="{{url('documentos',$Documento->id)}}" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>
                                </div>
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Documentos",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Documentos",
                                        "infoFiltered": "(Filtrado de _MAX_ total Documentos)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Documentos",
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
        </div>

    </div>

@endsection