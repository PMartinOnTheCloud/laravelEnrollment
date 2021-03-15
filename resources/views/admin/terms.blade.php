@extends('layouts.app')

@section('title', 'Administración | Cursos')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Cursos</h1>
            <div class="breadcrumb">Administración > Cursos</div>
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
                    toastr["info"]('Mostrando los cursos activos...');
                    showDataInTable({'name': ['Nombre', 'text'], 'description': ['Descripción', 'text'], 'start': ['Fecha de comienzo', 'date'], 'end': ['Fecha de finalización', 'date'], 'actions': ['Acciones', '']}, data, '.terms-info', 'terms');
                },
                error: (data) => {
                    toastr["error"]('Ha ocurrido un problema a la hora de mostrar los cursos activos. Por favor, vuelva a actualizar la página.');
                }
            });
        });
        </script>
    </div>
@endsection
