<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = "events.events";

    public function insert_event($post_data, $calendar_id){

        $event = new Event();

        $event->name = $post_data['name'];
        $event->description = $post_data['description'];
        $event->day = $post_data['day'];
        $event->calendar_id = $calendar_id;

        return $event->save();

    }

    public function update_event(Event $event, $patch_data){

        $event->name = $patch_data['name'];
        $event->description = $patch_data['description'];
        $event->day = $patch_data['day'];

        $event->update();

    }

    public function delete_event(Event $event){
        return $event->delete();
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function calendar(){
        return $this->belongsTo(Calendar::class);
    }
}
