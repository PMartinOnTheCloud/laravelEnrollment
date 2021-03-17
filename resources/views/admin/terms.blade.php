@extends('layouts.cursos')

@section('title', 'Administración | Cursos')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Cursos</h1>
            <div class="breadcrumb">Administración > Cursos</div>
        </div>

        <div class="container px-4">
            <div class="row gx-5">
                <button type="button" class="btn btn-success btn-sm" style="float: left; margin: 10px 0 10px 0; width: 10%;" data-bs-toggle="modal" data-bs-target="#createObjectModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="terms-info col">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                  <span class="sr-only"></span>
                </div>
            </div>
        </div>

        <div class="container px-4">
            <div class="row gx-5">
                <button type="button" class="btn btn-success btn-sm" style="float: left; margin: 10px 0 10px 0; width: 10%;" data-bs-toggle="modal" data-bs-target="#createObjectModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>

        <div id="createObjectModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createObjectModalLabel">Crear un nuevo curso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="createObjectForm" onsubmit="createObject(['#createButtonObject', '#createCancelButtonObject'], 'terms', 'curso'); return false;">
                        <div class="modal-body">
                            <fieldset>
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">Nombre</label>
                                    <input type="text" id="nameInput" name="name" class="form-control" placeholder="Inserta aquí el nombre del curso" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descriptionInput" class="form-label">Descripción</label>
                                    <input type="text" id="descriptionInput" name="description" class="form-control" placeholder="Inserta aquí la descripción del curso" required>
                                </div>
                                <div class="mb-3">
                                    <label for="startInput" class="form-label">Fecha de comienzo</label>
                                    <input type="date" id="startInput" name="start" class="form-control" placeholder="Inserta aquí la fecha de comienzo del curso" required>
                                </div>
                                <div class="mb-3">
                                    <label for="endInput" class="form-label">Fecha de final</label>
                                    <input type="date" id="endInput" name="end" class="form-control" placeholder="Inserta aquí la fecha de final del curso" required>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button id="createCancelButtonObject" type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button id="createButtonObject" type="submit" class="btn btn-success">Agregar</button>
                        </div>
                    <form>
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
                    toastr["info"]('Mostrando los cursos activos');
                    showDataInTable({'name': ['Nombre', 'text'], 'description': ['Descripción', 'text'], 'start': ['Fecha de comienzo', 'date'], 'end': ['Fecha de finalización', 'date'], 'actions': ['Acciones', '']}, data, '.terms-info', 'terms', 'curso');
                },
                error: (data) => {
                    toastr["error"]('Ha ocurrido un problema a la hora de mostrar los cursos activos. Por favor, vuelva a actualizar la página.');
                }
            });
        });
        </script>
    </div>
@endsection
