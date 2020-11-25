<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profiles;

class profileController extends Controller
{
    public function index(Request $requwst)
    {
        $posts = Profiles::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = null;
           // $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
