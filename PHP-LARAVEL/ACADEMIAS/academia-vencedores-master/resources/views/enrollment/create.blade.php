@extends('layouts.app')

@section('content')
    <h3>Registrar matrícula</h3>

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
                <span class="card-title">Datos de la matrícula</span>

                <div class="row">
                    <div class="input-field col s6">
                        <select id="level" name="level" required>
                            <option value="" disabled selected>Escoja una opción</option>
                            <option value="Básico">Básico</option>
                            <option value="Intermedio">Intermedio</option>
                            <option value="Avanzado">Avanzado</option>
                        </select>
                        <label>Nivel</label>
                    </div>
                    <div class="input-field col s6">
                        <select id="semester" name="semester" required>
                            <option value="" disabled selected>Escoja una opción</option>
                            <option value="2017-I">2017-I</option>
                            <option value="2017-II">2017-II</option>
                        </select>
                        <label>Semestre</label>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col m6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Pagos</span>

                            <div class="input-field">
                                <input  id="enrollment_payment" name="enrollment_payment" placeholder="Pago por matrícula" type="number" required>
                                <label for="enrollment_payment">Matrícula</label>
                            </div>
                            <div class="input-field">
                                <input  id="monthly_payment" name="monthly_payment" placeholder="Pago por mensualidad" type="number" required>
                                <label for="monthly_payment">Mensualidad</label>
                            </div>
                            <div class="input-field">
                                <input  id="uniform_payment" name="uniform_payment" placeholder="Pago por uniforme" type="number" required>
                                <label for="uniform_payment">Uniforme</label>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col m6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Cursos</span>
                        @foreach ($courses as $course)
                        <p>
                            <input type="checkbox" name="courses[]" id="course{{ $course->id }}" value="{{ $course->id }}" />
                            <label for="course{{ $course->id }}">{{ $course->name }}</label>
                        </p>
                        @endforeach
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
                <br>
                <div class="input-field">
                    {{--<button class="waves-effect waves-light blue btn">--}}
                    {{--Imprimir--}}
                    {{--</button>--}}
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
    <script>
        // required for Materialize selects
        $("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});
    </script>
    <script src="/js/enrollments/elements-form.js"></script>
@endsection
