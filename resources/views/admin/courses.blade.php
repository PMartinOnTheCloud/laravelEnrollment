@extends('layouts.app')

@section('title', 'Administración | Cursos')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Cursos</h1>
        </div>

        <div class="terms-info row">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                  <span class="sr-only"></span>
                </div>
            </div>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            $.ajax({
                url: '{{ asset('api/terms') }}',
                method: 'GET',
                headers: {
                    token: $("meta[name='_token']").attr("content"),
                },
                success: (data) => {
                    showDataInTable({'name': 'Nombre', 'description': 'Descripción', 'start': 'Fecha de comienzo', 'end': 'Fecha de finalización', 'actions': 'Acciones'}, data, '.terms-info');
                }
            });
        });

        $('form').submit(function () {

        });
        </script>
    </div>
@endsection
