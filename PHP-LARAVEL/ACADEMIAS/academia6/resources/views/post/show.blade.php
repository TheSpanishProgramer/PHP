@extends('layouts.layout')

@section('meta-title')
    {{ $post->title }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>{{ $post->subject->name }} en {{ $post->subject->category->name }}</h4>
                    </div>
                    <div class="col-lg-5 text-right">
                        <a href="{{ route('post') }}" class="btn btn-primary mini-margen-bot">Volver</a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">{{ $post->user->name }} at {{ $post->created_at->format('M d Y H:i') }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        {!! $post->contenido !!}
                        <a href="{{ route('document.show', $post->document) }}" target="_blank">Ver documento</a>
                        <br />

                        @if($post->user->id === auth()->user()->id)

                            <form action="{{ route('post.destroy', $post) }}" method="POST">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar el mensaje?')">Eliminar post</button>
                            </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if(isset($respuestas) && count($respuestas) > 0)
            <div class="row">
                <div class="col-lg-8">
                    @foreach($respuestas as $respuesta)
                        <hr />
                        <div class="card">
                            <h5 class="card-header">{{ $respuesta->user->name }} at {{ $post->created_at->format('M d Y H:i') }}</h5>
                            <div class="card-body">
                                <h5 class="card-title">{{ $respuesta->title }}</h5>
                                {!! $respuesta->contenido !!}
                                <a href="{{ route('document.show', $respuesta->document) }}" target="_blank">Ver documento</a>
                                <br />

                                @if($respuesta->user->id === auth()->user()->id)

                                    <form action="{{ route('post.destroy', $respuesta) }}" method="POST">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar el mensaje?')">Eliminar post</button>
                                    </form>

                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                <hr/>

                <h5>Responder:</h5>

                <form action="{{ route('post.respuesta.store', $post) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="titleID">Titulo</label>
                        <input type="text" name="title" id="titleID" class="form-control" value="{{ old('title') }}" placeholder="titulo de la respuesta">
                        {!! $errors->first('title', '<span class="help-block text-danger">:message</span>') !!}
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