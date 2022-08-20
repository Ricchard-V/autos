@extends('layouts.app')
@section('header')
	<div class="py-3 px-2">
		<div>
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} ({{ (Request::ip())}})
            </a>
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	            <a class="dropdown-item" href="{{ route('logout') }}"
	               onclick="event.preventDefault();
	                             document.getElementById('logout-form').submit();">
	                {{ __('Logout') }}
	            </a>

	            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	                @csrf
	            </form>
	        </div>
		</div>
	</div>
	<hr>
@section('main')
	<div class="container mx-auto p-5 bg-light shadow h-75">
		<h2 class="text-center my-5">Seguimiento a sorteo C.I Autos</h2>
		<div class="d-flex justify-content-end">
			<a href="{{ route('admin.show',Auth::user()->id) }}" class="btn">Descargar Excel</a>
		</div>
		<table class="table">
			<thead class="table-dark">
				<tr>
					<th></th>
					<th>Cedula</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Correo</th>
					<th>Celular</th>
					<th>Departamento</th>
					<th>Ciudad</th>
					<th>Fecha registro</th>
					<th>Hora registro</th>
				</tr>
			</thead>
			<tbody>
				@foreach($clientes as $cliente)
				<tr class="@if($cliente->ganador) bg-success @endif">
					<td>{{ $cliente->ganador }}</td>
					<td>{{ $cliente->documento }}</td>
					<td>{{ $cliente->nombre }}</td>
					<td>{{ $cliente->apellido }}</td>
					<td>{{ $cliente->email }}</td>
					<td>{{ $cliente->celular }}</td>
					<td>{{ $cliente->departamento}}</td>
					<td>{{ $cliente->ciudad }}</td>
					<td>{{ date('d/m/Y',strtotime($cliente->created_at)) }}</td>
					<td>{{ date('h:i A',strtotime($cliente->created_at)) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection