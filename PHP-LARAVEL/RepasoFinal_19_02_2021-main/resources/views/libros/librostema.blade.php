<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ "Libros de $nombreTema" }}
        </h2>
    </x-slot>
    <div class="container  mx-auto p-2 w-4/5">
        <x-mensajes-alertas></x-mensajes-alertas>
        <a href="{{ route('libros.create') }}"
            class=" my-8 bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow text-xs mt-5">
            <i class="fa fa-plus"></i> Nuevo Libro</a>
        <table class="table p-4">
            <thead class="font-bold bg-gray-100">
                <tr>
                    <th class="p-2">Detalles</th>
                    <th class="p-2">Titulo</th>
                    <th class="p-2">Stock</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $item)
                    <tr class="my-2 py-8">
                        <td class="p-4"> <a href="{{ route('libros.show', $item) }}"
                                class="bg-indigo-600 hover:bg-indigo-800 rounded text-white font-bold py-2 px-4 shadow text-xs mt-5">
                                <i class="fas fa-info-circle"></i> Detalle</a></td>
                        <td class="p-2">{{ $item->titulo }}</td>

                        <td class="p-2">{{ $item->stock }}</td>
                        <td class="p-2">
                            <form name="a" method="POST" action="{{ route('libros.destroy', $item) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('libros.edit', $item) }}"
                                    class="my-8 bg-yellow-600 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow text-xs mt-5">
                                    <i class="fa fa-edit"></i> Editar</a>
                                <button type="submit"
                                    class="my-8 bg-red-600 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow text-xs"><i
                                        class="fa fa-trash"></i> Borrar</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2">
            {{ $libros->links() }}
        </div>
    </div>

</x-app-layout>
