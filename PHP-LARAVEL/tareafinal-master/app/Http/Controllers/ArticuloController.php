<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Vendedor;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ArticuloRequest;
use Illuminate\Support\Facades\Storage;
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vendedor=$request->get('vendedor_id');
        $vendedors=Vendedor::orderBy('id')->get();
        $articulos=Articulo::orderBy('id')
        ->vendedor($vendedor)
        ->paginate(2);
        return view('articulos.index',compact('articulos', 'vendedors', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias=Categoria::all();
        return view('articulos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $request)
    {
        //
         //validaciones genericas
       $datos=$request->validated();
       //dd($datos);
        //cojo los datos por que voy a modificar el request
        
        $articulo=new Articulo();
        $articulo->nombre=$datos['nombre'];
        $articulo->pvp=$datos['pvp'];
        $articulo->stock=$datos['stock'];
        $articulo->categoria_id=$datos['categoria_id'];
 

         //compruebo si he subido archivo
         if(isset($datos['imagen'])){
            //Todo bien hemos subido un archivo y es de imagen
            $file=$datos['imagen'];
            //creo un nombre
            $nombre='articulos/'.time().' '.$file->getClientOriginalName();
            //guardo ek archivo imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //le damos a alumno un nombre que le hemos puesto al fichero
            $articulo->imagen="img/$nombre";

        }
        $articulo->save();
        return redirect()->route('articulos.index')->with('mensaje', 'Articulo creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
        //devuelvo la vista detalles.blade.php con el articulo
        return view('articulos.detalles', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        //
        $categorias=Categoria::all();
        return view('articulos.edit', compact('categorias','articulo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(ArticuloRequest $request, Articulo $articulo)
    {
        //
        //
         //validaciones genericas
       $datos=$request->validated();
       //dd($datos);
        //cojo los datos por que voy a modificar el request

        $articulo->nombre=$datos['nombre'];
        $articulo->pvp=$datos['pvp'];
        $articulo->stock=$datos['stock'];
        $articulo->categoria_id=$datos['categoria_id'];
 

         //compruebo si he subido archivo
         if(isset($datos['imagen'])){
            //Todo bien hemos subido un archivo y es de imagen
            $file=$datos['imagen'];
            //creo un nombre
            $nombre='articulos/'.time().' '.$file->getClientOriginalName();
            //guardo ek archivo imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //le damos a alumno un nombre que le hemos puesto al fichero
            $articulo->imagen="img/$nombre";

        }
        $articulo->update();
        return redirect()->route('articulos.index')->with('mensaje', 'Articulo modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        //
        //guardo la imagen del articulo a borrar
        $foto=$articulo->imagen;
        //compruebo que la foto no sea default
        if(basename($foto)!="default.jpg"){
            //borro la foto si no es default
            unlink($foto);
        }
        //borramos el articulo
        $articulo->delete();
        //y volvemos al index de articulos
        return redirect()->route('articulos.index')->with('mensaje','Articulo borrado correctamente');
    }
}
