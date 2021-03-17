@extends('layouts.app')

@section('title', 'Administración | Alumnos')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Alumnos</h1>
            <div class="breadcrumb">Administración > Alumnos</div>
        </div>

        <div class="students-info col">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links('pagination::bootstrap-4') }}

        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            toastr["info"]('Mostrando los alumnos');
        });
        </script>
    </div>
@endsection
