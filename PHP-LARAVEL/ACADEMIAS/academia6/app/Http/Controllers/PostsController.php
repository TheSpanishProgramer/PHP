<?php

namespace App\Http\Controllers;

use App\Document;
use App\Post;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        // un array con el id de las asignaturas a las que se encuentra matriculado
        $userSubjectsId = array();
        foreach (auth()->user()->subjects as $subject) {
            $userSubjectsId[] = $subject->id;
        }

        $posts = Post::whereIn('subject_id', $userSubjectsId)->whereNull('post_id')->latest()->paginate();

        return view('post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $respuestas = Post::where('post_id', $post->id)->oldest()->get();

        return view('post.show', compact('post', 'respuestas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'document_id' => 'required|exists:documents,id',
            'contenido' => 'required|max:250'
        ]);

        Post::create($request->all());

        return redirect()->back()->with('success', 'El mensaje ha sido creado');
    }

    public function storeRespuesta(Post $post, Request $request)
    {
        // si puede ver el post puede comentar en él
        $this->authorize('view', $post);

        //$id = Subject::where('id', Document::where('id', $post->document_id)->get()[0]->subject_id)->first()->id;
        //dd(Subject::where('id', Document::where('id', $post->document_id)->get()[0]->subject_id)->first());
        //dd(isset(auth()->user()->subjects()->where('subject_id', $id)->get()[0]));
        //$this->authorize('create', Subject::where('id', Document::where('id', $post->document_id)->get()[0]->subject_id)->first());

        $this->validate($request, [
            'title' => 'required|string|max:100',
            'contenido' => 'required|max:250'
        ]);

        $request['post_id'] = $post->id;
        $request['document_id'] = $post->document_id;

        Post::create($request->all());

        return redirect()->back()->with('success', 'El mensaje ha sido creado');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->back()->with('success', 'El mensaje ha sido eliminado');
    }
}
