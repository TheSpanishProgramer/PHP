@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard <a href="{{URL::to("/home")}}">Voltar</a></div>
                    {{--<h1>Edição da Agenda</h1>--}}
                    <div class="panel-body">
                        <div class="row">
                            <h1>{{$calendar->title}}</h1>
                            <p>{{$calendar->description}}</p>
                        </div>
                        @if( count($calendar->events) > 0)
                            <div class="row">
                                <ul class="list-group">
                                    @foreach($calendar->events as $event)
                                        <li class="list-group-item">
                                            <a href="/event/{{$event->id}}"> {{$event->name}} {{Carbon\Carbon::createFromFormat('Y-m-d', $event->day)->format('d/m/Y')}} </a>
                                            <a href="/event/delete/{{$event->id}}" class="pull-right">Exlcuir</a>
                                            <a href="/event/edit/{{$event->id}}" class="pull-right">Editar</a>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <h3>Cadastro de Evento</h3>
                            <form action="/event/add" method="post">
                                {{csrf_field()}}
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Almoço com a família..."/>
                                <textarea name="description">{{old('description')}}</textarea>
                                <input type="date" name="day" value="{{old('day')}}" />
                                <button name="send" class="btn btn-primary">Evento +</button>
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
