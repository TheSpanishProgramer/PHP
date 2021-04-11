<?php

namespace App\Http\Controllers\Admin;

use App\Contactme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactmeController extends Controller
{
    public function index()
    {
        $contacts = Contactme::all();

        return view('admin.contact.index', compact('contacts'));
    }

    public function destroy(Contactme $contactme)
    {
        $contactme->delete();

        return redirect()->back()->with('success', 'Se ha eliminado el mensaje.');
    }

    public function solved(Contactme $contactme)
    {
        if ($contactme->solved) {
            $contactme->solved = 0;
            $contactme->save();
        } else if (!$contactme->solved) {
            $contactme->solved = 1;
            $contactme->save();
        }

        return redirect()->back()->with('success', 'El campo solved ha sido cambiado');

    }
}
