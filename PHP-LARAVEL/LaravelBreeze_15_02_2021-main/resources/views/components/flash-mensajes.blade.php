@if($texto=Session::get('mensaje'))

<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 my-3" role="alert">
    <p class="font-bold">Información</p>
    <p class="text-sm">{{$texto}}</p>
  </div>

@endif
@if($texto=Session::get('error'))

<div class="bg-red-700 border-t border-b border-blue-500 text-white-400 px-4 py-3 my-3" role="alert">
    <p class="font-bold">Error</p>
    <p class="text-sm">{{$texto}}</p>
  </div>

@endif
