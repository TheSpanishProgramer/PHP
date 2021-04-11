<?php

namespace App\Http\Controllers;

use App\Calendar;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class CalendarController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Calendar $calendar){

        Session::flash('calendar_id', $calendar->id);

        return view('calendar.index')->with('calendar', $calendar);
    }

    public function add(Request $post, Calendar $calendar){
        $this->validate($post, [
            'title' => 'required|min:6|max:255',
            'description' => 'min:6'
        ]);

        $calendar->insert_calendar($post);

        return back();

    }

    public function delete(Calendar $calendar){

        $calendar->delete();
        return back();

    }

    public function edit(Calendar $calendar){
        return view("calendar.edit")->with("calendar", $calendar);
    }

    public function update(Calendar $calendar, Request $patch){

        $this->validate($patch, [
            'title' => 'required|min:6|max:255',
            'description' => 'min:6'
        ]);

        $calendar->update_calendar($calendar, $patch);

        return redirect('/home');
    }

}
