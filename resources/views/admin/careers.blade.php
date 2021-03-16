@extends('layouts.app')

@section('title', 'Administración | Ciclos')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Ciclos</h1>
            <div class="breadcrumb">Administración > Ciclos</div>
        </div>

        <div class="container px-4">
            <div class="row gx-5">
                <button type="button" class="btn btn-success btn-sm" style="float: left; margin: 10px 0 10px 0; width: 10%;" data-bs-toggle="modal" data-bs-target="#createObjectModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="careers-info col">
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
                        <h5 class="modal-title" id="createObjectModalLabel">Crear un nuevo ciclo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" id="createObjectForm" onsubmit="createObject(['#createButtonObject', '#createCancelButtonObject'], 'careers', 'ciclo'); return false;">
                        <div class="modal-body">
                            <fieldset>
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">Nombre</label>
                                    <input type="text" id="nameInput" name="name" class="form-control" placeholder="Inserta aquí el nombre del ciclo" required>
                                    <div class="invalid-feedback">
                                        Por favor, inserte un nombre.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="descriptionInput" class="form-label">Descripción</label>
                                    <input type="text" id="descriptionInput" name="description" class="form-control" placeholder="Inserta aquí la descripción del ciclo" required>
                                    <div class="invalid-feedback">
                                        Por favor, inserte una descripción.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="codeInput" class="form-label">Código</label>
                                    <input type="text" id="codeInput" name="code" class="form-control" placeholder="Inserta aquí el código del ciclo" required>
                                    <div class="invalid-feedback">
                                        Por favor, inserte un código.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="termInput" class="form-label">Curso para asignar</label>
                                    <select id="termInput" class="form-select" name="term_id" onclick="getSelectOptionsByObject(this, 'terms');">
                                        <option value="" selected disabled>Selecciona el curso para asignarlo a este curso</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, inserte un código.
                                    </div>
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
                url: '{{ asset('api/careers') }}',
                method: 'GET',
                headers: {
                    token: $("meta[name='_token']").attr("content"),
                },
                success: (data) => {
                    toastr["info"]('Mostrando los ciclos activos...');
                    showDataInTable({'name': ['Nombre', 'text'], 'code': ['Código', 'text'], 'description': ['Descripción', 'text'], 'actions': ['Acciones', '']}, data, '.careers-info', 'careers', 'ciclo');
                },
                error: (data) => {
                    toastr["error"]('Ha ocurrido un problema a la hora de mostrar los ciclos activos. Por favor, vuelva a actualizar la página.');
                }
            });
        });
        </script>
    </div>
@endsection
