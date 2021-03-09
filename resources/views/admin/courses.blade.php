@extends('layouts.app')

@section('title', 'Administración | Cursos')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Cursos</h1>
        </div>

        <button type="button" class="btn btn-primary btn-sm" style="width: 10%;" disabled>Editar</button>

        <!--<table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>-->

        <div class="terms-info row">

        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            $.get("/api/terms/getterms", function(data) {
                showDataInTable({'name': 'Nombre', 'description': 'Descripción', 'start': 'Fecha de comienzo', 'end': 'Fecha de finalización'}, data, '.terms-info');
            });
        });
        </script>
    </div>
@endsection
