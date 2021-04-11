@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <h1>Edição de Eventos</h1>
                    <div class="panel-body">
                        <div class="row">
                            <form action="/event/{{$event->id}}/update" method="post">
                                {{method_field("PATCH")}}
                                {{csrf_field()}}
                                <input type="text" name="name" value="{{$event->name}}" placeholder="Almoço com a família..."/>
                                <textarea name="description">{{$event->description}}</textarea>
                                <input type="date" name="day" value="{{$event->day}}" />
                                <button name="send" class="btn btn-primary">Editar</button>
                                <a href="{{URL::previous()}}">Cancelar</a>
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
