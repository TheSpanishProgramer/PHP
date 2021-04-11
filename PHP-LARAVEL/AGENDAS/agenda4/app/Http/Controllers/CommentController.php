<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;


class CommentController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function add(Request $post) {

        $this->validate($post, [
            'text' => 'required|min:5'
        ]);

        $comment = new Comment();
        $comment->insert_comment($post->all(), Session::get('event_id'));

        return back();

    }

    public function edit(Comment $comment){
        return view("comments.edit")->with("comment", $comment);
    }

    public function update(Comment $comment, Request $patch){

        $this->validate($patch, [
            'text' => 'required|min:5'
        ]);

        $comment->update_comment($comment, $patch->all());

        return redirect('/event/' . $comment->event_id);
    }

    public function delete(Comment $comment){

        $comment->delete_comment($comment);
        return back();

    }

}
