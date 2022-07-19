<?php

namespace App\Http\Controllers;


use ZipArchive;
use Illuminate\Support\Facades\File;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(){
        if (auth()->user()->isAdmin){
            return view('admin', ['mangas' => Manga::all(), 'categories' => Category::all(), ]);
        }
        else{
            return redirect('/')->with('failure', 'Non hai i permessi per accedere a questa pagina');
        }
        
    }

    private function storeChapter(Request $request){
        $attributes = $request->validate([
            'name' => 'required|unique:chapters,name',
            'manga_id' => 'required|exists:mangas,id',
        ]);
        $attributes['slug'] = Str::slug($request->input('name'));
        $manga = Manga::find($request->input('manga_id'));
        $attributes['path'] = "/mangas" . "/" . Str::of($manga->name)->remove(" ") . '/chapters' . '/' . Str::of($request->input('name'))->remove(" ") . '/';
        $new_chapter = Chapter::create($attributes);
        

        $zip = new ZipArchive();
        $status = $zip->open($request->file("chapter_file")->getRealPath());
        if ($status !== true) {
         throw new \Exception($status);
        }
        else{
            $storageDestinationPath= public_path( "/mangas" . "/" . Str::of($manga->name)->remove(" ") . '/' . 'chapters/'. '/' .  Str::of($request->input('name'))->remove(" ") . '/' );
       
            if (!File::exists( $storageDestinationPath)) {
                File::makeDirectory($storageDestinationPath, 0755, true);
            }
            $zip->extractTo($storageDestinationPath);
            $zip->close(); 
        }

        return redirect()->back()->with('success', 'Capitolo aggiunto');
    }


    private function storeManga(Request $request){
        $attributes = $request->validate([
            'name' => 'required|unique:mangas,name',
            'author' => 'required|max:255',
            'publication_year' => 'required',
            'description' => 'required',
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);
        $attributes['rating'] = 0.00;
        $avatar = $request->file('avatar');
        $avatar->move(public_path("/mangacovers"), Str::of(request()->input('name'))->remove(" ") . "." . $avatar->getClientOriginalExtension());
        $attributes['avatar'] = "/mangacovers" . "/" . Str::of(request()->input('name'))->remove(" ") . "." . $avatar->getClientOriginalExtension();
        $new_manga = Manga::create($attributes);
        //Aggiunte categorie
        $categories = $request->input('categories');
        foreach ($categories as $cat_id){
            $current_cat = Category::find($cat_id);
            $new_manga->categories()->attach($current_cat);
        }
        return redirect()->back()->with('success', 'Manga aggiunto');
    }


    private function storeCategory(Request $request){
        $attributes = $request->validate([
            'name' => 'required|unique:categories,name',
        ]);
        $attributes['slug'] = Str::slug($request->input('name'));
        Category::create($attributes);
        return redirect()->back()->with('success', 'Categoria aggiunta');
    }


    public function store(Request $request){
        $toSave = $request->input('type');

        if ($toSave == 'chapter'){
            return $this->storeChapter($request);
        }elseif ($toSave == 'manga'){
            return $this->storeManga($request);
        }elseif($toSave == 'category'){
            return $this->storeCategory($request);
        }else{
            return redirect()->back();
        }
    }

}
