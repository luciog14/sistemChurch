@extends('layouts.admin')

@section('contenido')

    <div class="container-fluid">
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
                        <h3 class="card-title "><b>Padrinos Registrados</b></h3>
                        <div class="card-tools">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{url('bautizos')}}" class="btn btn-primary"> <i class="nav-icon fa fa-dove"></i> Bautizos</a>
                                <a href="{{url('confirmaciones')}}" class="btn btn-primary"><i class="nav-icon fas fa-child"></i> Confirmaciones</a>
                                <a href="{{url('matrimonios')}}" class="btn btn-primary"><i class="nav-icon fas fa-file-contract"></i> Matrimonios</a>
                                <a href="{{url('padrinos/create')}}" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Agregar Padrino</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Telefono</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador=0; ?>
                            @foreach($padrinos as $Padrino)
                            <tr>
                                <td><?php echo $contador=$contador+1;?></td>
                                <td>{{$Padrino->padrCedula}}</td>
                                <td>{{$Padrino->padrNombre}}</td>
                                <td>{{$Padrino->padrApellido}}</td>
                                <td>{{$Padrino->padrTelefono}}</td>
                                <td>{{$Padrino->padrDireccion}}</td>
                                <td style="text-align:center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('padrinos.edit',$Padrino->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <a href="{{url('padrinos',$Padrino->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                    <form id="deleteForm" action="{{url('padrinos',$Padrino->id)}}" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este registro?')" class="btn btn-danger">
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Padrinos",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Padrinos",
                                        "infoFiltered": "(Filtrado de _MAX_ total Padrinos)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Padrinos",
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
