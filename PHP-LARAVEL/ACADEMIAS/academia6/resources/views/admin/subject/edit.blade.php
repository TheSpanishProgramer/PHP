@extends('admin.layouts.layout')

@section('meta-title')
    Editar asignatura
@endsection

@section('meta-title-header')
    Editar asignatura
@endsection

@section('content')

    <div class="panel panel-green">
        <div class="panel-heading">
            Editar {{ $subject->name }} en {{ $subject->category->name }}
        </div>
        <div class="panel-body">

            <form action="{{ route('admin.subject.update', $subject) }}" method="POST">
                {{ csrf_field() }} {{ method_field('PUT') }}

                <div class="row">
                    <div class="form-group col-lg-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Nombre de la asignatura</label>
                        <input type="text" name="name" id="name" placeholder="introduzca un nombre" class="form-control" value="{{ old('name', $subject->name) }}">
                        {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                    <div class="form-group col-lg-6 {{ $errors->has('category_id') ? 'has-error' : '' }}">
                        <label for="category_id">Curso</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option {{ old('name', $subject->category_id) == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                </div>

                <div class="row {{ $errors->has('user_id') ? 'has-error' : '' }}">

                    <div class="form-group col-lg-3">
                        <label for="user_id" class="control-label">Profesor:</label>
                    </div>
                    <div class="form-group col-lg-9">
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach($profesores as $profesor)
                                <option {{ old('name', $subject->user_id) == $profesor->id ? 'selected' : '' }} value="{{ $profesor->id }}">{{ $profesor->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('user_id', '<span class="help-block text-danger">:message</span>') !!}
                    </div>

                </div>

                <div class="row">
                    <div class="form-group">
                        <button class="btn btn-primary margen-izquierda-normal">Crear</button>
                        <a href="{{ route('admin.subject') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection