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
                            <form action="/user/add" method="post">
                                {{csrf_field()}}
                                <input type="text" name="name" value="{{old('name')}}" placeholder="nome"/>
                                <input type="email" name="email" value="{{old('email')}}" placeholder="email"/>
                                <input type="password" name="password" value="{{old('password')}}" placeholder="senha"/>
                                <button name="send" class="btn btn-primary">Usuário +</button>
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

                        @if(!empty($users))
                            <div class="row">
                                <ul class="list-group">
                                    @foreach($users as $user)
                                        <li class="list-group-item">
                                            <a href="calendar/{{$user->id}}">
                                                {{$user->name}} | {{$user->email}}
                                            </a>
                                            <a href="/user/delete/{{$user->id}}" class="pull-right">Excluir</a>
                                            <a href="/user/edit/{{$user->id}}" class="pull-right">Editar</a>
                                            <a href="/user/permission/{{$user->id}}" class="pull-right">Permissões</a>
                                        </li>
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
