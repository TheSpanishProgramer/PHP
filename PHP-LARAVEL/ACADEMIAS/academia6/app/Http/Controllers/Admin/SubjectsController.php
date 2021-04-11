<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectsController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();

        return view('admin.subject.index', compact('subjects'));
    }

    public function destroy(Subject $subject)
    {
        $subject->documents()->delete();

        $subject->delete();

        return redirect()->route('admin.subject')->with('success', 'Asignatura eliminada correctamente');
    }

    public function create()
    {
        $categories = Category::whereNotNull('category_id')->orWhere('name', 'PAU')->get();
        $profesores = User::role('profesor')->get();

        return view('admin.subject.create', compact('categories', 'profesores'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id'
        ]);

        $category = Category::where('id', $request->category_id)->first();

        $arraySubcategoies = Category::where('category_id', $category->id)->get();

        if (isset($arraySubcategoies) && count($arraySubcategoies) > 0) {
            return redirect()->back()->with('fail', 'El curso seleccionado tiene subcursos y por tanto no puede tener asignaturas');
        }

        Subject::create($request->all());

        return redirect()->back()->with('success', 'Asignatura creada con exito');
    }

    public function edit(Subject $subject)
    {
        $categories = Category::whereNotNull('category_id')->orWhere('name', 'PAU')->get();
        $profesores = User::role('profesor')->get();

        return view('admin.subject.edit', compact('subject', 'categories', 'profesores'));
    }

    public function update(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id'
        ]);

        $subject->name = $request->name;
        $subject->category_id = $request->category_id;
        $subject->user_id = $request->user_id;
        $subject->update();

        return redirect()->back()->with('success', 'Se editado la asignatura correctamente.');
    }

    public function generarMatricula(Subject $subject)
    {
        $subject->matricula = str_random(10);

        $subject->save();

        return redirect()->back()->with('success', 'Se ha cambiado la clave para matricularse');
    }
}
