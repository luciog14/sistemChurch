@extends('layouts.admin')

@section('contenido')
    <section class="content container-fluid" style="width: 80%;">
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
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card shadow mt-3 card card-outline card-success">
                    <div class="card-header">
                        <span class="card-title">Crear de confirmación</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('confirmaciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('confirmacione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
