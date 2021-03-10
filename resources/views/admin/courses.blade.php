@extends('layouts.app')

@section('title', 'Administración | Cursos')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Cursos</h1>
        </div>

        <button type="button" class="btn btn-primary btn-sm" style="width: 10%;" disabled>Editar</button>

        <div class="terms-info row">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                  <span class="sr-only">Cargando...</span>
                </div>
            </div>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            $.get("/api/terms/getterms", function(data) {
                showDataInTable({'name': 'Nombre', 'description': 'Descripción', 'start': 'Fecha de comienzo', 'end': 'Fecha de finalización'}, data, '.terms-info');
                $('button[disabled]').removeAttr('disabled');
            });
        });
        </script>
    </div>
@endsection
