@extends('layouts.layout')

@section('meta-title')
    {{ $subject->name }}
@endsection

@section('content')

    <div class="container">

        <h2>{{ $subject->category->name }}: {{ $subject->name }}</h2>

        <a href="{{ route('subject.post', $subject) }}">Ver posts de {{ $subject->name }}</a>

        @include('partials.breadcrumb')

        @if($subject->user_id === auth()->user()->id)
            <a href="{{ route('subject.edit', $subject) }}" class="btn btn-secondary">Editar asignatura</a>
        @endif

        @if(isset($subject->documents) && count($subject->documents) > 0)

            <div class="card margen-arriba">
                <div class="card-header">
                    Documentos de la asignatura:
                </div>
                <div class="card-body">

                    @foreach($subject->documents as $doc)

                        <p><a href="{{ route('document.show', $doc) }}" target="_blank">{{ $doc->name }}</a></p>

                        <p>{{ $doc->description }}</p>

                        <a href="{{ route('document.show', $doc) }}" target="_blank" class="btn btn-primary">Ver documento</a>

                        <a href="{{ route('document.post', $doc) }}" class="btn btn-primary">Ver posts asociados a este documento</a>

                        <hr />

                    @endforeach

                </div>
            </div>

        @else

            <h3 class="margen-arriba">No hay documentos en esta asignatura</h3>

        @endif

        <hr />

        @if(isset($subject->documents) && count($subject->documents) > 0)
            <div class="row">
                <div class="col-lg-12">

                    <h4>Crear un comentario</h4>

                    <form action="{{ route('post.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="titleID">Titulo</label>
                            <input type="text" name="title" id="titleID" class="form-control" value="{{ old('title') }}" placeholder="titulo de la respuesta">
                            {!! $errors->first('title', '<span class="help-block text-danger">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="documentID">Documento</label>
                            <select name="document_id" id="documentID" class="form-control">

                                @foreach($subject->documents as $document)

                                    <option {{ old('document_id') == $document->id ? 'selected' : '' }} value="{{ $document->id }}">{{ $document->name }}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group {{ $errors->has('contenido') ? 'has-error' : '' }}">
                            <label for="editar">Contenido</label>
                            <textarea name="contenido" id="editor" class="form-control" rows="10">{{ old('contenido') }}</textarea>
                            {!! $errors->first('contenido', '<span class="help-block text-danger">:message</span>') !!}
                        </div>

                        <div class="form-gorup">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

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