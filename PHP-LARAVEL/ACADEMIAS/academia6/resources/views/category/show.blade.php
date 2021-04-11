@extends('layouts.layout')

@section('meta-title')

    Cursos

@endsection

@section('content')

    <div class="container">

        @if(isset($categories) && count($categories) > 0)

            @if(isset($category->name))

                <h2>{{ $category->name }}</h2>

            @else

                <h2>Cursos disponibles:</h2>

            @endif

            @include('partials.breadcrumb')

            <div class="list-group margen-arriba">
                @foreach($categories as $category)

                    <a href="{{ route('category.show', $category) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>

                @endforeach
            </div>

        @else

            @if(isset($category->name))

                <h2>Asignaturas en {{ $category->name }}</h2>

            @else

                <h2>Asignaturas:</h2>

            @endif

            @include('partials.breadcrumb')

            <div class="list-group margen-arriba">
                @foreach($subjects as $subject)

                    <a href="{{ route('subject', $subject) }}" class="list-group-item list-group-item-action">{{ $subject->name }}</a>

                @endforeach
            </div>

        @endif

    </div>

@endsection