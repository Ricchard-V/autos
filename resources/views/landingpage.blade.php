@extends('layouts.app')
@section('main')
<div class="container-fluid">

	@if(\Session::has('status'))
		<div>Gracias por participar y Buena suerte</div>
	@endif
	<div class="header-tittle text-center px-5">
		<h1 class="">Juntos en esta Gran Aventura</h1>
		<h4 class="my-3 mx-auto">
			Compañía Importante de Automóviles premia tu fidelidad. llena el siguiente formulario y participa en nuestro sorteo 
		</h4>

	</div>
	<hr>
	<div class="row p-2">
		<form action="{{ route('admin.store') }}" method="POST" class="col-12 col-md-6 col-lg-4 bg-white p-5 shadow">
			@csrf
		{{--COMPONENTE (components/input.blade.php) PARA SIMPLIFICAR VISTA, PIDE COMO VARIABLE EL NOMBRE DEL CAMPO, EL NOMBRE VISIBLE AL USUARIO y EL TIPO DE INPUT, aplica 	validacion y estilos --}}


		{{--  Campo nombre --}}
			@include('components.input',array('inputName'=>'nombre','labelName'=>'Nombres'))
		{{-- Campo Apellido --}}
			@include('components.input',array('inputName'=>'apellido','labelName'=>'Apellidos'))
		{{-- Campo documento --}}
			@include('components.input',array('inputName'=>'documento','labelName'=>'Cedula de Ciudadania'))
		{{-- Campo departamento --}}
			<div>
				<label for="departamento">Departamento</label>
				<select name="departamento" id="departamento" class="form-select" onchange="find()">
					<option value="0">--</option>
				</select>
				@if ($errors->has('departamento'))
				    <small class="text-danger">{{ $errors->first('departamento') }}</small>
				@endif
			</div>
		{{-- Campo ciudad --}}
			<div>
				<label for="ciudad">Ciudad</label>
				<select name="ciudad" id="ciudad" class="form-select"></select>
				@if ($errors->has('ciudad'))
				    <small class="text-danger">{{ $errors->first('ciudad') }}</small>
				@endif
			</div>

		{{-- Campo celular --}}
			@include('components.input',array('inputName'=>'celular','labelName'=>'Celular'))

		{{-- Campo email --}}
			@include('components.input',array('inputName'=>'email','labelName'=>'Correo Electronico','type'=>'email'))


		{{-- campo habeasData --}}
		{{-- @include('components.input',array('inputName'=>'habeas','labelName'=>habeas' --}}

			<div>
				<input type="checkbox" name="habeas" value = 1>
				<label for="habeas">
					<small>Autorizo el tratamiento de mis datos de acuerdo con la finalidad establecida en la política de protección de datos personales
					<a class="btn" href="https://www.sic.gov.co/manejo-de-informacion-personal#:~:text=El%20derecho%20de%20h%C3%A1beas%20data%20es%20aquel%20que%20tiene%20toda,de%20naturaleza%20p%C3%BAblica%20o%20privada." target="blank">haga click aqui</a></small>
				</label>
				@if ($errors->has('habeas'))
				    <small class="text-danger">{{ $errors->first('habeas') }}</small>
				@endif
			</div>


			<div class="py-2">
				<button class="btn btn-outline-primary col-12">Participar</button>
			</div>
		</form>
		<div class="col-md-6 align-self-end mb-5 px-5">
			<p>
				Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Fuga, vitae, optio, dicta quisquam explicabo quis nemo soluta ipsa harum quam quasi, aspernatur dolore eos laboriosam quidem magnam beatae eaque voluptatum.
			</p>
			<div class="p-2 shadow-sm">
				<h3 class="text-center">Si tu nombre aparece aqui eres el feliz ganador</h3>
				@if(session('ganador'))
					<div class="alert alert-success text-center">Felicitaciones a {{ session('ganador')[0]['nombre']}} {{ session('ganador')[0]['apellido'] }}</div>
				@else
					<div></div>
				@endif
			</div>
			
		</div>
	</div>
</div>
<script src="{{ asset('js/landing.js')}}"></script>
@endsection
