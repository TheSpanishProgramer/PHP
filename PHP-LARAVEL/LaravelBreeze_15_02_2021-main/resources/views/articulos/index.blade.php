<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Mi Bazar' }}
        </h2>
    </x-slot>
    <div class="container  mx-auto p-2 w-4/5">
       <!-- CArgo los mensajes de error o éxito-->
       <x-flash-mensajes></x-flash-mensajes>

        <a href="{{ route('articles.create') }}"
            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow text-xs mt-5">
            <i class="fa fa-plus"></i> Nuevo Articulo</a>

        <div class="text-center grid grid-cols-5 py-2 gap-2 mt-10 border-2 border-blue-200 shadow text-xm">
            <div class="font-bold  text-gray-700">Detalle</div>
            <div class="font-bold text-gray-700">Nombre</div>
            <div class="font-bold text-gray-700">Descripción</div>
            <div class="font-bold text-gray-700">PVP(€)</div>
            <div class="font-bold text-gray-700">Acciones</div>
        </div>
        <div class="text-center grid grid-cols-5 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5 text-xs">
            @foreach ($articulos as $item)
                <div class="mb-5">
                    <a href="{{ route('articles.show', $item) }}"
                        class="bg-purple-400 hover:bg-green-200 rounded text-white font-bold py-2 px-4 shadow">
                        <i class="fa fa-info"></i> Detalle</a>
                </div>
                <div>
                    {{ $item->nombre }}
                </div>
                <div class="text-justify">
                    {{ $item->desc }}
                </div>
                <div>
                    {{$item->pvp}}
                </div>

                <div>
                    <form name="a" action="{{route('articles.destroy', $item)}}" method='POST'>
                        @csrf
                        @method("DELETE")
                        <a href="{{route('articles.edit', $item)}}" class="bg-yellow-600 hover:bg-yellow-400 rounded text-white font-bold py-2 px-4 shadow">
                            <i class="fa fa-edit"></i> Actualizar</a>
                        <button type="submit" class="bg-red-500 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow">
                            <i class="fa fa-trash"></i> Borrar</button>
                    </form>
                </div>

            @endforeach


        </div>
        <div class="mt-4">
            {{ $articulos->links() }}
        </div>
    </div>

</x-app-layout>
