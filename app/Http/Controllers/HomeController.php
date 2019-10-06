<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Line;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Story::where('user_id',Auth::user())->pluck('id')->toArray();
        $contributions = Line::where('user_id', 1)->get()->pluck('story_id')->toArray();
        $stories = Story::find(array_unique(array_merge($author, $contributions)));
        if(count($stories) < 1) {
            $stories = Story::all()->sortByDesc('weighted_satisfactor')->unique();
        }
        return view('home')->withStories($stories);
    }
}
