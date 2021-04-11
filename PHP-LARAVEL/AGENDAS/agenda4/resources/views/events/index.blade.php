@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard <a href="{{URL::to("/calendar/" . $event->calendar_id)}}">Voltar</a></div>
                    <h3>Evento da agenda: {{$event->calendar->title}}</h3>
                    <div class="panel-body">

                        <div class="row">
                            <h1>{{$event->name}} </h1>
                            <h3>Data: {{Carbon\Carbon::createFromFormat('Y-m-d', $event->day)->format('d/m/Y')}}</h3>
                            <p class="text-justify">{{$event->description}}</p>
                        </div>
                        @if( count($event->comments) > 0)
                            <div class="row">
                                <ul class="list-group">
                                    @foreach($event->comments as $comment)
                                        <li class="list-group-item">
                                            <a href="#">{{$comment->text}}</a>
                                            <a href="/comment/delete/{{$comment->id}}" class="pull-right">Exlcuir</a>
                                            <a href="/comment/edit/{{$comment->id}}" class="pull-right">Editar</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <form action="/comment/add" method="post">
                                {{csrf_field()}}
                                <textarea name="text">{{old('text')}}</textarea>
                                <button name="send" class="btn btn-primary">Comentario +</button>
                            </form>
                        </div>
                        @if(!empty($errors))
                            <div class="row">
                                <ul class="list-group">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item">{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
