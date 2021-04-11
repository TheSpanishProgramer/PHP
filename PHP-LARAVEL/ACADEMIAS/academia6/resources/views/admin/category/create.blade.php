@extends('admin.layouts.layout')

@section('meta-title')
    Crear curso
@endsection

@section('meta-title-header')
    Nuevo curso
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Crear nuevo curso
                </div>
                <div class="panel-body">

                    <form action="{{ route('admin.category.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nameId">Nombre del curso</label>
                                    <input type="text" class="form-control" name="name" id="nameId" placeholder="nombre del curso" value="{{ old('name') }}">
                                    {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">

                                    <label for="categoryID">Curso al que pertenece</label>

                                    <select name="category_id" id="categoryID" class="form-control">

                                        <option value="">Ninguno</option>

                                        @foreach($categories as $category)

                                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>

                                        @endforeach

                                    </select>

                                    {!! $errors->first('category_id', '<span class="help-block text-danger">:message</span>') !!}

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <button type="submit" class="btn btn-primary">Crear</button>
                                <a href="{{ route('admin.category') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection