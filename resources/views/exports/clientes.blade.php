<table>
	<thead>
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
		<tr>
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