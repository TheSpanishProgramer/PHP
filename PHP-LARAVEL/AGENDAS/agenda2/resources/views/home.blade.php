@extends('layouts.app')

@section('content')

	<div class="row" ng-controller="homeCtrl">
		<div class="col-xs-12 col-sm-12 col-md-4">
			<div id="calendario">
				<input type="hidden" id="data_selecionada">
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8">
			<div class="text-center">
				<table class="table table-striped">
				    <thead>
				        <th>Cliente</th>
				        <th>Obra</th>
				        <th>Andamento</th>
				    </thead>
                    <tr>
                        <td>Loja Atacadão</td>
                        <td>Teste</td>
                        <td>Teste da lista de tarefas</td>
                    </tr>
				</table>
			</div>
		</div>
	</div>

@stop
