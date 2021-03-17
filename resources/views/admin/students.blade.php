@extends('layouts.app')

@section('title', 'Administración | Alumnos')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Alumnos</h1>
            <div class="breadcrumb">Administración > Alumnos</div>
        </div>

		<div class="container px-4">
            <div class="row gx-5">
				<button title="Importar" type="button" class="btn btn-secondary btn-sm" style="float: left; margin: 10px 0 10px 10px; width: 10%;">
					<i class="fas fa-file-import"></i>
                </button>
            </div>
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

		<div class="container px-4">
            <div class="row gx-5">
				<button title="Importar" type="button" class="btn btn-secondary btn-sm" style="float: left; margin: 10px 0 10px 10px; width: 10%;">
					<i class="fas fa-file-import"></i>
                </button>
            </div>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            toastr["info"]('Mostrando los alumnos');
        });
        </script>
    </div>
@endsection
