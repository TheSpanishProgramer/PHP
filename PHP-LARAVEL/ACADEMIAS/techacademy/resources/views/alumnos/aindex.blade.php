@extends('plantillas.plantilla1')
@section('titulo')
Alumnos
@endsection
@section('cabecera')
Gestión de Alumnos
@endsection
@section('contenido')
<a href="{{route('alumnos.create')}}"
            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-plus"></i> Nuevo Alumno</a>
<div class="text-center grid grid-cols-5 py-2 gap-2 mt-10 border-2 border-blue-200 shadow">
    <div class="font-bold text-xl text-gray-700">Detalle</div>
    <div class="font-bold text-xl text-gray-700">Nombre</div>
    <div class="font-bold text-xl text-gray-700">Mail</div>
    <div class="font-bold text-xl text-gray-700">Foto</div>
    <div class="font-bold text-xl text-gray-700">Acciones</div>
</div>
<div class="text-center grid grid-cols-5 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5">
    @foreach($alumnos as $item)
    <div class="mb-5">
        <a href="{{route('alumnos.show', $item)}}"
        class="bg-purple-400 hover:bg-green-200 rounded text-white font-bold py-2 px-4 shadow">
        <i class="fa fa-info"></i> Detalle</a>
    </div>
    <div>
        {{$item->apellidos.", ".$item->nombre}}
    </div>
    <div>
        {{$item->mail}}
    </div>
    <div class="mx-auto">
        <img src="{{asset($item->foto)}}" class="rounded-full align-middle h-auto w-10 border-2">
    </div>
    <div>
        Acciones ...
    </div>

    @endforeach


</div>
<div class="mt-10">
    {{$alumnos->links()}}
</div>


@endsection
