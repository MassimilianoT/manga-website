<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\User;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('favourites', ['mangas' => $user->favourites,]);
    }

    public function add(Request $request){
        try{
            $id = $request->input('manga');
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
                
            $manga = Manga::find($id);
            if ($user->favourites->contains($id)){
                $user->favourites()->detach($manga);
                return ['favourite' => 'false'];
            }else{
                $user->favourites()->attach($manga);
                return ['favourite' => 'true'];
            }
        }
        catch (\Exception $e) {
            return $e;
    }
        

    }
}
