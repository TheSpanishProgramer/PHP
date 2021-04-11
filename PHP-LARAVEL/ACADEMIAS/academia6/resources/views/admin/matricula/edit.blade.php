@extends('admin.layouts.layout')

@section('meta-title')
    Matricular usuario
@endsection

@section('meta-title-header')
    Administrar matriculas de {{ $user->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-7">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Matricular en
                </div>
                <div class="panel-body">

                    <form action="{{ route('admin.matricula.store', $user) }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="subject" class="control-label">{{ $user->name }} matricular en:</label>
                            <select name="subject" id="subject" class="form-control">

                                @foreach($subjects as $subject)

                                    <option value="{{ $subject->id }}">{{ $subject->name }} en {{ $subject->category->name }}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Matricular</button>
                            <a href="{{ route('admin.matricula') }}" class="btn btn-secondary">Volver</a>
                        </div>

                    </form>
                    
                </div>
            </div>

        </div>

        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }} matriculado en
                </div>
                <div class="panel-body">
                    @if(isset($user->subjects) && count($user->subjects) > 0)
                        @foreach($user->subjects as $subject)

                            <p style="display: inline">{{ $subject->name }} en {{ $subject->category->name }}</p>

                            <form action="{{ route('admin.matricula.destroy', [$user, $subject]) }}" method="POST" style="display: inline" class="pull-right">
                                {{ csrf_field() }} {{ method_field('DELETE') }}

                                <button class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que quiere desmatricular a este usuario?')">
                                    <i class="fa fa-times"></i>
                                </button>

                            </form>

                            <hr />

                        @endforeach
                    @else

                        <h4>No se encuentra matriculado en ningún curso</h4>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection