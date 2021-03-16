@extends('layouts.app')

@section('title', 'Administración | Cursos')

@section('content')
	<div class="container">
		<div class="container-info">
			<h1>Cursos</h1>
            <div class="breadcrumb">Administración > Cursos > Eliminar > {{ $term->name }}</div>
		</div>
        <div class="card">
            <h5 class="card-header alert-danger">Eliminar un curso</h5>
            <div class="card-body">
                <p class="card-text">Has seleccionado el curso <code>{{ $term->name }}</code> para eliminarlo. ¿Estás seguro que quieres hacer esto? Para confirmar esta acción, por favor, inserta el nombre del curso que vas a eliminar.</p>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameTerm" placeholder="Inserta aquí el nombre del curso para confirmar" onkeyup="allowButtonToPressIfTextIsSame('{{ $term->name }}', this.value, '#deleteObject');">
                </div>
                <div class="col-sm-10" style="margin-top: 15px;">
                    <button id="deleteObject" type="button" class="btn btn-danger" onclick="softDeleteObject({{ $term->id }}, 'terms', 'curso');" disabled>Eliminar</button>
                    <a type="button" href="{{ asset('/admin/terms') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
	</div>
@endsection
