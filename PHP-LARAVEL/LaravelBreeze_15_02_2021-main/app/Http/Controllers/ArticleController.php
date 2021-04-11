<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            ['auth', 'verified'],
            ['only' => ['edit', 'update', 'create', 'destroy', 'store']]

        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Article::orderBy('nombre')->paginate(2);
        return view('articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:50'],
            'desc' => ['required', 'string', 'min:15', 'max:300'],
            'pvp' => ['required', 'numeric']
        ]);
        try {
            Article::create($request->all());
            return redirect()->route('articles.index')->with("mensaje", "Artículo creado");
        } catch (\Exception $ex) {
            return redirect()->route('articles.index')->with("error", "No se pudo guardar el ....: ".$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articulos.detalle', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articulos.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'max:50'],
            'desc' => ['required', 'string', 'min:15', 'max:300'],
            'pvp' => ['required', 'numeric']
        ]);
        try{
            $article->update($request->all());
            return redirect()->route('articles.index')->with("mensaje", "Artículo Actualizado");
        }catch(\Exception $ex){
            return redirect()->route('articles.index')->with("error", "No se pudo actualizar el artículo: ".$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try{
            $article->delete();
            return back()->with("mensaje", "Artículo Borrado");
        }catch(\Exception $ex){
            return back()->with("mensaje", "Error al borrar");
        }
    }
}
