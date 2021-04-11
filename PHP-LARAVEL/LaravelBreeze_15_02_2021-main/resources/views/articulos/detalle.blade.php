<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Detalle Artículo' }}
        </h2>
    </x-slot>
    <div class="flex items-center w-full justify-center">

        <div class="max-w-xs mt-10">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="photo-wrapper p-2">
                    <img class="w-32 h-32 rounded-full mx-auto" src="{{ asset('storage/img/logo.jpeg') }}"
                        alt="Logo Bazar">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ $article->nombre }}</h3>
                    <div class="text-center text-gray-400 text-xs font-semibold">
                        <p class="text-justify">{{ $article->desc }}</p>
                    </div>
                    <table class="text-xs my-3">
                        <tbody>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Artículo Creado</td>
                                <td class="px-2 py-2">{{ $article->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Registro Actualizado</td>
                                <td class="px-2 py-2">{{ $article->updated_at }}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Precio (€)</td>
                                <td class="px-2 py-2">{{ $article->pvp }}</td>
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>

    </div>

</x-app-layout>
