<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = "events.comments";

    public function insert_comment($post_data, $event_id){

        $comment = new Comment();
        $comment->text = $post_data['text'];
        $comment->event_id = $event_id;

        return $comment->save();
    }

    public function update_comment(Comment $comment, $patch_data){

        $comment->text = $patch_data['text'];
        return $comment->update();
    }

    public function delete_comment(Comment $comment){
        return $comment->delete();
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }

}
