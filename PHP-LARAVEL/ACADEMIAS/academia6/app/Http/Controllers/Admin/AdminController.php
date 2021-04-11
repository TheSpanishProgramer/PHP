<?php

namespace App\Http\Controllers\Admin;

use App\Contactme;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $users = count(User::role('invitado')->get());
        $contacts = count(Contactme::where('solved', 0)->get());

        return view('admin.dashboard', compact('users', 'contacts'));
    }
}
