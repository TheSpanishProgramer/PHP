@extends('layouts.app')

@section('content')
    <h3>Matrículas</h3>
    <table>
        <thead>
        <tr>
            <th>DNI</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Nivel</th>
            <th>Semestre</th>
            <th>Matrícula</th>
            <th>Mensualidad</th>
            <th>Uniforme</th>
            <th>Detalles</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($enrollments as $enrollment)
        <tr>
            <td>{{ $enrollment->student->dni }}</td>
            <td>{{ $enrollment->student->name }}</td>
            <td>{{ $enrollment->student->lastName }}</td>

            <td>{{ $enrollment->level }}</td>
            <td>{{ $enrollment->semester }}</td>

            <td>S/. {{ $enrollment->enrollment_payment }}</td>
            <td>S/. {{ $enrollment->monthly_payment }}</td>
            <td>S/. {{ $enrollment->uniform_payment }}</td>

            <td>
                <a title="submit" class="modal-trigger waves-effect waves-light btn" href="#modal{{ $enrollment->id }}">
                    <i class="material-icons">toc</i>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @foreach ($enrollments as $enrollment)
    <div id="modal{{ $enrollment->id }}" class="modal">
        <div class="modal-content">
            <h4>Cursos que contiene la matrícula</h4>
            <ul class="collection">
                @foreach ($enrollment->selected_courses as $course)
                <li class="collection-item"><strong>{{ $course->name }}: </strong>{{ $course->description }}</li>
                @endforeach
            </ul>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
        </div>
    </div>
    @endforeach

    <div class="fixed-action-btn ">
        <a data-add="x" href="/matricula/registrar" title="REGISTRAR MATRÍCULA" class="btn-floating btn-large teal">
            <i class="large material-icons">add</i>
        </a>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('.modal').modal();
        });
    </script>
@endsection