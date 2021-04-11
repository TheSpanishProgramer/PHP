<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Calendar extends Model
{

    protected $table = "calendars.calendars";



    public function selectAllFromUse($user){

//        return DB::table('calendars.calendars')->where('user_id', '=', $user->id)->orderBy('title')->get();
        return  Calendar::where('user_id', $user['id'])->orderBy('title')->get();

    }

    public function insert_calendar($post){

        $post_data = $post->all();
        $logged_user = $post->user();

        $calendar = new Calendar();
        $calendar->title = $post_data['title'];
        $calendar->description = $post_data['description'];
        $calendar->user_id = $logged_user['id'];

        return $calendar->save();

    }

    public function update_calendar(Calendar $calendar, $patch){

        $patch_data = $patch->all();
        $calendar->title = $patch_data['title'];
        $calendar->description = $patch_data['description'];

        return $calendar->update();
    }

    public function events(){
        return $this->hasMany(Event::class);
    }

}
