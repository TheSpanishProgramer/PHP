<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Contacto' }}
        </h2>
    </x-slot>
    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-flash-mensajes></x-flash-mensajes>
        <form name="create" method="POST" action="{{ route('contact.send') }}">
            @csrf
            <x-form-input name="subject" label="Escriba el motivo de su mensaje" placeholder="Subject" />
            <x-form-textarea name="mensaje" placeholder="Consulta" label="Escriba su consulta" />
            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="far fa-paper-plane"></i> Enviar</span>
                </x-form-submit>
            </div>
        </form>
    </div>
</x-app-layout>
