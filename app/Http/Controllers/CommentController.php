<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Manga $manga){
        $user_id = auth()->user()->id; 
        $manga_id = $manga->id;
        $title = request()->input('title');
        $body = request()->input('body');
        $rating = request()->input('rating');

        $new_comment = Comment::create(['title' => $title, 'body' => $body, 'rating' => $rating, 'user_id' => $user_id, 'manga_id' => $manga_id]);
        //Aggiorno recensioni
        $new_comment->updateReviews();
        $new_comment->save();

        return redirect()->back();
    }
}
