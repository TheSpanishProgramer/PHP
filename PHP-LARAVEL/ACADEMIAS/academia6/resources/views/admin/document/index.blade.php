@extends('admin.layouts.layout')

@section('meta-title')
    Documentos
@endsection

@section('meta-title-header')
    Crear documentos
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Crear un documento
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.document.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <div class="col-lg-1">
                                    <label class="control-label" for="name">Nombre:</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="titulo del documento" value="{{ old('name') }}">
                                    {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('subject_id') ? 'has-error' : '' }}">
                                <div class="col-lg-2">
                                    <label for="subject_id" class="control-label">Asignatura:</label>
                                </div>
                                <div class="col-lg-5">
                                    <select name="subject_id" id="subject_id" class="form-control">
                                        @foreach($subjects as $subject)

                                            <option {{ old('description') == $subject->id ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }} en {{ $subject->category->name }}</option>

                                        @endforeach
                                    </select>
                                    {!! $errors->first('subject_id', '<span class="help-block text-danger">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description" class="control-label">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="10">{{ old('description') }}</textarea>
                                {!! $errors->first('description', '<span class="help-block text-danger">:message</span>') !!}
                            </div>

                            <div class="col-lg-12 form-group">
                                <label for="exampleFormControlFile1">Documento</label>
                                <input type="file" class="form-control-file" name="document-file" id="exampleFormControlFile1">
                                {!! $errors->first('document-file', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <button type="submit" class="btn btn-primary">Crear documento</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <h1>Administración de documentos</h1>
        <hr>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="alert alert-info">
                <p><i class="fa fa-comment"></i> Las asignaturas sin documentos no se mostrarán</p>
            </div>
        </div>

        @foreach($subjects as $subject)

            @if(isset($subject->documents) && count($subject->documents) > 0)

                <div class="col-md-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Curso: {{ $subject->category->name }} | Asignatura: {{ $subject->name }}
                        </div>
                        <div class="panel-body">

                            <table class="table">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Ver</th>
                                    <th>Eliminar</th>
                                </tr>

                                @foreach($subject->documents as $document)

                                    <tr>
                                        <td>{{ $document->name }}</td>
                                        <td>
                                            <a href="{{ route('document.show', $document) }}" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.document.delete', $document) }}" method="POST">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger" onclick="return confirm('¿Está seguro de que quiere eliminar el documento?')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>

                                @endforeach

                            </table>

                        </div>
                    </div>

                </div>

            @endif

        @endforeach

    </div>

 @endsection