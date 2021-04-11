<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.table-header, p {
	font-size: 10px; 
	font-weight: bold; 
	text-align: center;
	background-color: #dee4e5;
}

td {
	font-size: 9px;
}
</style>

<table class="table">	
	<tr>
		<th class="table-header">Nombres</th>
        <th class="table-header">Apellidos</th>
        <th class="table-header">Tipo Documento</th>
        <th class="table-header">Número Documento</th>
        <th class="table-header">Tipo Docente</th>
        <th class="table-header">Email</th>
        <th class="table-header">Tel</th>
        <th class="table-header">Cel</th>
	</tr>
	@foreach($profesores as $profesor)
		<tr>
			<td>{{$profesor->nombres}}</td>
			<td>{{$profesor->apellidos}}</td>
			<td>{{$profesor->tipoDocumento->nombre}}</td>
			<td>{{$profesor->nro_doc}}</td>
			<td>{{$profesor->tipoDocente->nombre}}</td>
			<td>{{$profesor->email}}</td>
			<td>{{$profesor->tel}}</td>
			<td>{{$profesor->cel}}</td>
		</tr>
	@endforeach
</table>