@extends('layouts.app')

@section('title', 'Administración | Cursos - Eliminar curso')

@section('content')
    <div class="container">
        <div class="container-info">
            <h1>Cursos</h1>
        </div>

        <div class="card">
            <div class="card-header alert-danger">
                Borrar el curso #{{ $id }}
            </div>
            <div class="card-body">
                <form onsubmit="softDeleteObject({{ $id }}, 'terms', '#softdelete'); return false;">
                    <div class="mb-3 row">
                        <p>Has seleccionado el botón de borrar para eliminar el curso <tt>{{ $name }}</tt>. Para asegurarnos de que quieres borrar este curso, inserta el nombre del curso para poder realizar la eliminación correctamente.</p>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" onkeyup="checkIfSameValueInput('{{ $name }}', this.value, '#softdelete');" placeholder="Inserta aquí el nombre del curso.">
                        </div>
                    </div>
                    <button id="softdelete" class="btn btn-danger" disabled>Borrar</button>
                    <a href="{{ asset('/admin/courses') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
