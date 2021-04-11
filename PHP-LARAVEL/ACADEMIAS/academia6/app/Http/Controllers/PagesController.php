<?php

namespace App\Http\Controllers;

use App\Contactme;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'message' => 'required|max:250'
        ]);

        Contactme::create($request->all());

        return redirect()->back()->with('success', 'El formulario se ha enviado correctamente. Le responderemos lo antes posible.');
    }
}
