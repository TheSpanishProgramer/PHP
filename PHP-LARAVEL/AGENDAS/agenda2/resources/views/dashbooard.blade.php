@extends('layouts.app')

@section('content')

	<div class="row" ng-controller="homeCtrl">
		<div class="col-xs-12 col-sm-12 col-md-4">
			<div id="calendario">
				<input type="hidden" id="data_selecionada">
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4">
			<div class="text-center">
				<table class="table table-striped">
				    <thead>
				        <th>Hora</th>
				        <th>Título</th>
				        <th>Descrição</th>
				    </thead>
                    <tr>
                        <td>9:00</td>
                        <td>Teste</td>
                        <td>Teste da lista de tarefas</td>
                    </tr>
                    <tr>
                        <td>10:00</td>
                        <td>Teste</td>
                        <td>Teste da lista de tarefas</td>
                    </tr>
                    <tr>
                        <td>11:00</td>
                        <td>Teste</td>
                        <td>Teste da lista de tarefas</td>
                    </tr>
                    <tr>
                        <td>14:00</td>
                        <td>Teste</td>
                        <td>Teste da lista de tarefas</td>
                    </tr>
				</table>
			</div>
		</div>
	</div>

@stop
