@extends('layouts.app')

@section('title', 'Administración | Ciclos')

@section('content')
	<div class="container">
		<div class="container-info">
			<h1>Ciclos</h1>
            <div class="breadcrumb">Administración > Ciclos > Eliminar > {{ $career->name }}</div>
		</div>
        <div class="card">
            <h5 class="card-header alert-danger">Eliminar un ciclo</h5>
            <div class="card-body">
                <p class="card-text">Has seleccionado el ciclo <code>{{ $career->name }}</code> para eliminarlo. ¿Estás seguro que quieres hacer esto? Para confirmar esta acción, por favor, inserta el nombre del ciclo que vas a eliminar.</p>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameCareer" placeholder="Inserta aquí el nombre del ciclo para confirmar" onkeyup="allowButtonToPressIfTextIsSame('{{ $career->name }}', this.value, '#deleteObject');">
                </div>
                <div class="col-sm-10" style="margin-top: 15px;">
                    <button id="deleteObject" type="button" class="btn btn-danger" onclick="softDeleteObject({{ $career->id }}, 'careers', 'ciclo');" disabled>Eliminar</button>
                    <a type="button" href="{{ asset('/admin/careers') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
	</div>
@endsection
