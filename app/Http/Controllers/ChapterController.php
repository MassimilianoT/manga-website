<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class ChapterController extends Controller
{
    public function show(Manga $manga, Chapter $chapter)
    {
        //$manga->name/chapters/chapter->name"/Onepiece/chapters/Ch1/01.jpg";
        $path = $chapter->path;
        $files = File::files(public_path($path));
        $n_pages = count($files);
        return view('chapter', 
        [
            'chapter' => $chapter,
            'path' => $path,
            'n_pages' => $n_pages,
        ]);
    }
}
