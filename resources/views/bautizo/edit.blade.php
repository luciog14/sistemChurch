@extends('layouts.admin')
@section('contenido')
    <section class="content container-fluid" style="width: 80%;">
        <div class="row">

            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card shadow mt-3 card card-outline card-success">
                    <div class="card-header">
                        <span class="card-title">Actualizar registro de bautizo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bautizos.update', $bautizo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('bautizo.form')

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
