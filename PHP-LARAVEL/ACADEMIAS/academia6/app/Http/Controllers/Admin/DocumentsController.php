<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('admin.document.index', compact('subjects'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'max:200',
            'subject_id' => 'required|exists:subjects,id'
        ]);

        Document::create($request->all());

        return redirect()->back()->with('success', 'Se ha creado el documento');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->back()->with('success', 'Documento eliminado');
    }
}
