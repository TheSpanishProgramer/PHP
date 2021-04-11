@extends('admin.layouts.layout')

@section('meta-title')
    Editar post
@endsection

@section('meta-title-header')
    Editar un post existente
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Editar post
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.post.update', $post) }}" method="POST">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="">Titulo</label>
                                    <input type="text" name="title" id="titleID" class="form-control" value="{{ old('title', $post->title) }}" placeholder="titulo del post">
                                    {!! $errors->first('title', '<span class="help-block text-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group {{ $errors->has('document_id') ? 'has-error' : '' }}">
                                    <label for="documentID">Documento:</label>
                                    <select name="document_id" id="documentID" class="form-control">
                                        @foreach($documents as $document)

                                            <option {{ old('document_id', $post->document->id) == $document->id ? 'selected' : '' }} value="{{ $document->id }}">{{ $document->name }}</option>

                                        @endforeach
                                    </select>
                                    {!! $errors->first('document_id', '<span class="help-block text-danger">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('contenido') ? 'has-error' : '' }}">
                                    <label for="editor" class="control-label">Contenido</label>
                                    <textarea name="contenido" id="editor" class="form-control" rows="15">{{ old('contenido', $post->contenido) }}</textarea>
                                    {!! $errors->first('contenido', '<span class="help-block text-danger">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('admin.post') }}">Volver</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script src="/ckeditor/ckeditor.js"></script>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor' );
    </script>

@endpush