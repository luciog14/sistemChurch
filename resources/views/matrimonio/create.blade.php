@extends('layouts.admin')

@section('contenido')
    <section class="content container-fluid" style="width: 80%;">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card shadow mt-3 card card-outline card-success">
                    <div class="card-header">
                        <span class="card-title">Crear Matrimonio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('matrimonios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('matrimonio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
