<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Crear Artículo' }}
        </h2>
    </x-slot>
    <div class="container mt-3 mx-auto p-2 w-4/5">
        <form name="create" method="POST" action="{{ route('articles.store') }}">
            @csrf
            <x-form-input name="nombre" label="Nombre Artículo" placeholder="Nombre" />
            <x-form-input name="pvp" label="Precio Artículo (€)" placeholder="Precio" type="number" step='0.01'
                min='0' />
            <x-form-textarea name="desc" placeholder="Descripción artículo" label="Descripción" />
            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="fas fa-plus"></i> Crear</span>
                </x-form-submit>
            </div>
        </form>
    </div>
</x-app-layout>
