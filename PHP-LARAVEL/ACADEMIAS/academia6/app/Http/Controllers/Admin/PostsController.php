<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    public function edit(Post $post)
    {
        $documents = Document::all();

        return view('admin.post.edit', compact('post', 'documents'));
    }

    public function create()
    {
        $documents = Document::all();

        return view('admin.post.create', compact('documents'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Se ha eliminado el post correctamente');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'contenido' => 'required|max:250',
            'document_id' => 'required|exists:documents,id'
        ]);

        Post::create($request->all());

        return redirect()->back()->with('success', 'Se ha creado el post correctamente.');
    }

    public function update(Post $post, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'contenido' => 'required|max:250',
            'document_id' => 'required|exists:documents,id'
        ]);

        $request['subject_id'] = Document::where('id', $request['document_id'])->get()[0]->subject_id;

        $post->update($request->all());

        $post->generateSlug();

        return redirect()->route('admin.post.update', $post)->with('success', 'El post ha sido editado con exito.');
    }
}
