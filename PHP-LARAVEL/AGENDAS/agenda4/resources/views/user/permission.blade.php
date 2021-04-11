@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <h1>Edição de permições - {{$user->name}}</h1>
                    <div class="panel-body">

                        <div class="row">
                            <form action="/user/permission_set/{{$user->id}}" method="post">
                                {{csrf_field()}}

                                @foreach($permissions as $permission)
                                    <label>
                                        {{$permission->name}}
                                        <select name="{{$permission->id}}">
                                            <option value="1">TRUE</option>
                                            <option value="0">FALSE</option>
                                        </select>
                                    </label>
                                @endforeach


                                <button name="send" class="btn btn-primary">Definir Permissões</button>
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
