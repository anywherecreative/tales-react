<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Story;
use App\Line;

class SearchController extends Controller
{
    function index() {
        return view('search.form');
    }

    function results(Request $request) {
        if($request->term == "no" && $request->do == null) {
            return view('search.no');
        }
        $stories = Line::search($request->term)->get()->pluck('story');
        $stories = $stories->intersect(Story::search($request->term)->get());
        if(count($stories) == 0) {
            return view('search.noresults')->withTerm($request->term);
        }
        return view('search.results')->withStories($stories->unique())->withTerm($request->term);
    }
}
