@extends('layouts.app')

@section('title', 'Administración | Alumnos')

@section('content')
	<div class="container">
		<div class="container-info">
			<h1>Cursos</h1>
            <div class="breadcrumb">Administración > Alumnos > Eliminar > {{ $student->name }}</div>
		</div>
        <div class="card">
            <h5 class="card-header alert-danger">Eliminar un alumno</h5>
            <div class="card-body">
                <p class="card-text">Has seleccionado el alumno <code>{{ $student->name }}</code> para eliminarlo. ¿Estás seguro que quieres hacer esto? Para confirmar esta acción, por favor, inserta el nombre del alumno que vas a eliminar.</p>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameTerm" placeholder="Inserta aquí el nombre del alumno para confirmar" onkeyup="allowButtonToPressIfTextIsSame('{{ $student->name }}', this.value, '#deleteObject');">
                </div>
                <div class="col-sm-10" style="margin-top: 15px;">
                    <button id="deleteObject" type="button" class="btn btn-danger" onclick="softDeleteObject({{ $student->id }}, 'students', 'alumno');" disabled>Eliminar</button>
                    <a type="button" href="{{ asset('/admin/students') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
	</div>
@endsection
