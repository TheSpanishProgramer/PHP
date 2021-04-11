@extends('layouts.adminlte')

@section('content')
<div class="container-fluid">
	@include('reportes.header')
	<div id="filtros" class="col-xs-12">
		@include('reportes.filtros')
	</div>
	<div id="reporte" data-id-provincia="{{$provincia_usuario->id}}" style="display: none;">
		{{ csrf_field() }}
		<div class="col-md-12">
			<div class="box box-info ">
				<div class="box-header">
					<h3 class="box-tittle">Reporte
						<div class="btn-group pull-right ">
							<a href="#" class="btn btn-square excel" title="Excel"><i class="fa fa-file-excel-o text-success fa-lg"> Excel</i></a>
						</div>	
						</h3>
				</div>
				<div class="box-body">
					<table id="reporte-table" class="table table-hover"/>
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection

@section('script')
<script type="text/javascript">		

	$.unblockUI();

	$(document).ready(function(){
		var table;

		function getFiltrosJson() {
			var id_provincia = $('#filtros #provincia :selected').data('id');
			var id_periodo,desde,hasta;

			if($('#toggle-fecha i').hasClass('fa-toggle-off')){
				id_periodo = $('#filtros #periodo :selected').data('id');
			}else{
				desde = $('#filtros #desde').val();
				hasta = $('#filtros #hasta').val();
			}

			var data = {id_provincia: id_provincia,id_periodo: id_periodo,desde: desde,hasta: hasta};
			return data;
		};

		$('#filtrar').on('click',function () {
			var filtros = getFiltrosJson();			
			console.log(filtros);

			$('#reporte').show();

			table = $('#reporte-table').DataTable({	
			destroy: true,		
			ajax : {
				url: 'query',
				data: {
					id_reporte : 2,
					filtros: filtros
				}
			},
			columns: [
			{ data: 'periodo', title: 'Período'},
			{ data: 'provincia', title: 'Provincia'},
			{ data: 'cantidad_alumnos', title: 'Cantidad de participantes'}
			]
		});
	
		});

		$('.excel').on('click',function () {

			var filtros = getFiltrosJson();
			console.log(filtros);
			var order_by = $('#reporte-table').DataTable().order();
			console.log(order_by);

			$.ajax({
				url: 'excel',
				data: {
					id_reporte: 2,
					filtros: filtros,
					order_by: order_by
				},
				success: function(data){
					alert('Se descargara pronto.');
					console.log(data);
					window.location="descargar/excel/"+data;
					$("#dialogDownload").remove();
				},
				error: function (data) {
					alert('No se pudo crear el archivo.');
					console.log(data);
				}
			});
		});

		$('.pdf').on('click',function () {

			var filtros = getFiltrosJson();
			var order_by = $('#reporte-table').DataTable().order();			

			$.ajax({
				url: 'pdf',
				data: {
					id_reporte : 2, 
					filtros: filtros,
					order_by : order_by					
				},
				success: function(data){
					alert('Se descargara pronto.');
					console.log(data);
					window.location="descargar/pdf/"+data;
					$("#dialogDownload").remove();
				},
				error: function (data) {
					alert('No se pudo crear el archivo.');
					console.log(data);
				}
			});			
		});

	});
</script> 
@endsection
