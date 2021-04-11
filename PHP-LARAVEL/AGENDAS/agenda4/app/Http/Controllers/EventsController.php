<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class EventsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Event $event){

        Session::flash("event_id", $event->id);

        return view('events.index')->with("event", $event);

    }

    public function add(Request $post){

        $this->validate($post, [
            'name' => 'required|min:6|max:255',
            'description' => 'min:6',
            'day' => 'required'
        ]);

        $event = new Event();
        $event->insert_event($post->all(), Session::get('calendar_id'));

        return back();
    }

    public function edit(Event $event){

        $array_date = explode("-", $event->day);

        $event->day = \Carbon\Carbon::createFromDate($array_date[0], $array_date[1], substr($array_date[2], 0, 2), "America/Sao_Paulo")->format('Y-m-d');

        return view('events.edit')->with('event', $event);

    }

    public function update(Event $event, Request $patch){

        $this->validate($patch, [
            'name' => 'required|min:6|max:255',
            'description' => 'min:6',
            'day' => 'required'
        ]);

        $event->update_event($event, $patch->all());

        return redirect("/calendar/" . $event->calendar_id);
    }

    public function delete(Event $event){

        $event->delete_event($event);

        return back();
    }
}
