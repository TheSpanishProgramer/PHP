<?php

namespace App\Http\Controllers;

use App\Vendedor;
use App\Articulo;
use Illuminate\Http\Request;
use App\Http\Requests\VendedorRequest;
use Illuminate\Support\Facades\Storage;
class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $filtro=$request->get('filtro');
        $articulo=$request->get('articulo_id');
        $articulos=Articulo::orderBy('id')->get();
        $vendedors=Vendedor::orderBy('id')
        ->articulo($articulo)
        ->filtro($filtro)
        ->paginate(5);
        return view('vendedores.index', compact('vendedors', 'articulos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendedorRequest $request)
    {
        //
         //validaciones genericas
       $datos=$request->validated();
       //dd($datos);
        //cojo los datos por que voy a modificar el request
        
        $vendedor=new Vendedor();
        $vendedor->nombre=$datos['nombre'];
        $vendedor->apellido=$datos['apellido'];
        $vendedor->direccion=$datos['direccion'];
        $vendedor->telefono=$datos['telefono'];
        $vendedor->mail=$datos['mail'];
        
 

         //compruebo si he subido archivo
         if(isset($datos['imagen'])){
            //Todo bien hemos subido un archivo y es de imagen
            $file=$datos['imagen'];
            //creo un nombre
            $nombre='vendedors/'.time().' '.$file->getClientOriginalName();
            //guardo ek archivo imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //le damos a alumno un nombre que le hemos puesto al fichero
            $vendedor->imagen="img/$nombre";

        }
        $vendedor->save();
        return redirect()->route('vendedors.index')->with('mensaje', 'Vendedor creado correctamente');
        
    }

    public function fventas()
    {
        $vendedors=Vendedor::orderBy('id')->get();
        return view('vendedores.fventas', compact('vendedors'));

    }
    public function rventas()
    {
        $vendedors=Vendedor::orderBy('id')->get();
        $articulos=Articulo::orderBy('id')->get();
        return view('vendedores.rventas', compact('vendedors', 'articulos'));

    }

    public function vender(Request $request){
        
        $vendedor=Vendedor::find($request->vendedor);
        $articulo=Articulo::find($request->articulo);
        //precio total de venta
        $precio=$articulo->pvp * $request->cantidad;
        if($articulo->stock >= $request->cantidad){
            $vendedor->articulos()->attach($request->articulo, ['cantidad'=>$request->cantidad, 'cliente'=>$request->cliente, 'pvp'=>$precio]);
            $articulo->stock=$articulo->stock - $request->cantidad;
            $articulo->update();
        //dd($request->v);
        return redirect()->route('vendedors.fventas')->with('mensaje', 'Venta realizada correctamente');
        }else{
            return redirect()->route('vendedors.rventas')->with('error', 'No hay tantos articulos en Stock');
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendedor $vendedor)
    {
        //
        return view('vendedores.detalles',compact('vendedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedor)
    {
        //
        return view('vendedores.edit', compact('vendedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(VendedorRequest $request, Vendedor $vendedor)
    {
        //
        //validaciones genericas
       $datos=$request->validated();
        //cojo los datos por que voy a modificar el request
        $vendedor->nombre=$datos['nombre'];
        $vendedor->apellido=$datos['apellido'];
        $vendedor->direccion=$datos['direccion'];
        $vendedor->telefono=$datos['telefono'];
        $vendedor->mail=$datos['mail'];
        
         //compruebo si he subido archivo
         if(isset($datos['imagen'])){
            //Todo bien hemos subido un archivo y es de imagen
            $file=$datos['imagen'];
            //creo un nombre
            $nombre='vendedors/'.time().' '.$file->getClientOriginalName();
            //guardo ek archivo imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //le damos a alumno un nombre que le hemos puesto al fichero
            $vendedor->imagen="img/$nombre";

        }
        $vendedor->update();
        return redirect()->route('vendedors.index')->with('mensaje', 'Vendedor modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedor)
    {
        //
        //guardo la imagen del $vendedor a borrar
        $foto=$vendedor->imagen;
        //compruebo que la foto no sea default
        if(basename($foto)!="default.jpg"){
            //borro la foto si no es default
            unlink($foto);
        }
        //borramos el $vendedor
        $vendedor->delete();
        //y volvemos al index de vendedor
        return redirect()->route('vendedors.index')->with('mensaje','Vendedor borrado correctamente');
    }
}
