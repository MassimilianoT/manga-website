<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function checkUsername(Request $request){
        $username = $request->input('username');
        $email = $request->input('email');
        $username_found = false;
        $email_found = false;

        if (User::where('username', '=', $username)->count() > 0) {
            // user found
            $username_found = true;
         }

        if(User::where('email', '=', $email)->count() > 0){
            $email_found = true; 
        }
        return ['foundUsername'=> $username_found, 'foundEmail'=>  $email_found,];
    }
}
