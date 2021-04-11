@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <h1>Cadastro de Usuários</h1>
                    <div class="panel-body">

                        <div class="row">
                            <form action="/user/update/{{$user->id}}" method="post">
                                {{method_field("PATCH")}}
                                {{csrf_field()}}
                                <input type="text" name="name" value="{{$user->name}}" placeholder="nome"/>
                                <input type="email" name="email" value="{{$user->email}}" placeholder="email"/>
                                <label for="">
                                    ADM
                                    <input type="checkbox" name="adm" {{ ($user->adm ? "checked" : "") }}/>
                                </label>
                                <button name="send" class="btn btn-primary">Editar</button>
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
