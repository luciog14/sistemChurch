@extends('layouts.admin')

@section('contenido')
    <section class="content container-fluid" style="width: 60%;">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card shadow mt-3 card card-outline card-info">
                    <div class="card-header">
                        <span class="card-title">Actualizar datos de matrimonio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('matrimonios.update', $matrimonio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('matrimonio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
