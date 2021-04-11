<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Reporte General de Citas</title>
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <style type="text/css">
	  	body{
	  		font-family: 'Roboto', sans-serif;
	  	}
	  	.titulo{
				text-align: center;
			}
		table,th,td{
			border: 1px solid black;
		}
	  </style>
</head>
<body>
<table BORDER CELLPADDING=10 CELLSPACING=0 style="width:100%">
	<thead>
		<tr>
			<th colspan="6"><center><strong> Reporte de Citas</strong></center></th>
		</tr>
		<tr>
			<th class="titulo">Sede</th>
			<th class="titulo">Profesional</th>
			<th class="titulo">Fecha</th>
			<th class="titulo">Hora</th>
			<th class="titulo">Cliente</th>
			<th class="titulo">Servicio</th>
		</tr>
	</thead>
	<tbody>
		@foreach($reports as $report)
			<tr>
				<td class="titulo">{{ $report->sede}}</td>
				<td class="titulo">{{ $report->profesional}}</td>
				<td class="titulo">{{ $report->reservadate}}</td>
				<td class="titulo">{{ $report->reservatime}}</td>
				<td class="titulo">{{ $report->cliente}}</td>
				<td class="titulo">{{ $report->servicio}}</td>
			</tr>
		@endforeach
	</tbody>
	<tfoot>
		
	</tfoot>
</table>
</body>
</html>