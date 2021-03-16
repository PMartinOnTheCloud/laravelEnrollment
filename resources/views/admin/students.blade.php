@extends('layouts.app')

@section('title', 'Administración | Estudiantes')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Estudiantes</h1>
            <div class="breadcrumb">Administración > Estudiantes</div>
        </div>

        <div class="students-info col">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                  <span class="sr-only"></span>
                </div>
            </div>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            $.ajax({
                url: '{{ asset('api/students') }}',
                method: 'GET',
                headers: {
                    token: $("meta[name='_token']").attr("content"),
                },
                success: (data) => {
                    toastr["info"]('Mostrando los estudiantes activos...');
                    showDataInTable({'name': ['Nombre', 'text'], 'actions': ['Acciones', '']}, data, '.students-info', 'students', 'estudiante');
                },
                error: (data) => {
                    toastr["error"]('Ha ocurrido un problema a la hora de mostrar los estudiantes activos. Por favor, vuelva a actualizar la página.');
                }
            });
        });
        </script>
    </div>
@endsection
