@extends('layouts.app')

@section('content')
    <h3>Reportes</h3>

    <div class="card">
        <div class="card-content">
            <span class="card-title black-text">Reporte de alumnos</span>
            <p class="grey-text">Porcentaje de hombres y mujeres en la academia.</p>
            <div id="myChart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
    </div>

    <div class="card">
        <div class="card-content">
            <span class="card-title black-text">Reporte de cursos</span>
            <p class="grey-text">Cursos con más alumnos.</p>
            <div id="myChart2" style="height: 400px"></div>
        </div>
    </div>

    <div class="card">
        <div class="card-content">
            <span class="card-title black-text">Reporte de nivel</span>
            <p class="grey-text">Alumnos inscritos según el nivel.</p>
            <div id="myChart3" style="height: 400px"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script src="{{ asset('js/reports/students.js') }}"></script>
    <script src="{{ asset('js/reports/courses.js') }}"></script>
    <script src="{{ asset('js/reports/levels.js') }}"></script>
@endsection