@extends('layouts.app')

@section('content')
    <h3>Registrar notas</h3>

    <form action="" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="student_id" id="id" value="">

        <div class="card">
            <div class="card-content">
                <span class="card-title">Datos del alumno</span>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="dni" name="dni" placeholder="Ingrese aqui el DNI " type="number" required>
                        <label for="first_name">DNI</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="name" name="name" placeholder="Ingrese aqui el nombre " type="text" readonly>
                        <label for="first_name">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="lastName" name="lastName" placeholder="Ingrese aqui los apellidos " type="text" readonly>
                        <label for="first_name">Apellido</label>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">Tipo de examen de la matrícula</span>

                <div class="row">
                    <div class="input-field col s6">
                        <input name="type" type="radio" id="test1" value="Examen semanal" checked />
                        <label for="test1">Examen semanal</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="type" type="radio" id="test2" value="Examen simulacro" />
                        <label for="test2">Examen simulacro</label>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col m12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Cursos</span>
                        <div id="checkboxes">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col m6 center-align">
                <br>
                <div class="input-field">
                    <button title="submit" class="waves-effect waves-light btn">
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    @if (session('notification'))
        <script>
            $(function () {
                Materialize.toast('{{ session('notification') }}', 7000);
            });
        </script>
    @endif
    <script src="/js/notes/elements-form.js"></script>
@endsection
