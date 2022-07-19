<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class MangaController extends Controller
{

    public function show(Manga $manga)
    {
        $favourite = false;
        if (auth()->check()) {
            $user_can_comment = Comment::where('user_id', '=', auth()->user()->id)->where('manga_id', '=', $manga->id)->count() > 0;
            $favourite = auth()->user()->favourites->contains($manga);
        } else {
            $user_can_comment = false;
        }

        return view(
            'manga',
            [
                'manga' => $manga,
                'user_can_comment' => $user_can_comment,
                'favourite' => $favourite,
            ]
        );
    }
}
