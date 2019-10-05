<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\User;
use App\Satisfactor;
use App\Line;
use App\Intro;
use Illuminate\Support\Facades\Redirect;
use Auth;
class StoryController extends Controller
{
    const PERIOD_ALL = 1;
    function create() {
        return view('story.create')->withIntro(Intro::getLine());
    }

    function save(Request $request) {
        $user = Auth::user();
        $story = new Story();
        $story->title = $request->title;
        $story->rating = Story::getRatingConstant($request->rating);
        $story->description = $request->description;
        $story->user_id = $user->id;
        $story->save();
        $line = new Line();
        $line->user_id = $user->id;
        $line->story_id = $story->id;
        $line->content = $request->firstline;
        $line->save();
        return Redirect::route('story.view',['story'=>$story]);
    }

    function generate() {

    }

    function view(Story $story) {
        if(Auth::check()) {
            $userVote = Satisfactor::UserVote($story, Auth::user());
        }
        else {
            $userVote = 0;
        }
        return view('story.view')->withStory($story)->withUserSatisfactor($userVote);
    }

    function redirect(Story $story) {
        return Redirect::route('story.view',['story'=>$story]);
    }

    function random($rating=null) {
        if(!isset($rating)) {
            return Redirect::route('story.view',['story'=>Story::inRandomOrder()->first()]);
        }
        return Redirect::route('story.view',['story'=>Story::where('rating',Story::getRatingConstant($rating))->inRandomOrder()->first()]);
    }

    function topRated($period=self::PERIOD_ALL) {
        $stories = Story::all()->sortByDesc('weighted_satisfactor');
        return view('story.top')->withStories($stories->unique());
    }

    function upvote(Story $story) {
        if(!Auth::check()) {
            return response()->json([
                'status'    => 'ERROR',
                'reason'    => 'LOGIN',
                'message'   => 'You must be logged in to vote'
            ]);
        }
        else {
            return response()->json([
                'status'           => "SUCCESS",
                'satisfactor'      => $story->upvote(),
                'userSatisfactor'  => Satisfactor::UserVote($story, Auth::user())
            ]);
        }
    }

    function downvote(Story $story) {
        if(!Auth::check()) {
            return response()->json([
                'status'    => 'ERROR',
                'reason'    => 'LOGIN',
                'message'   => 'You must be logged in to vote'
            ]);
        }
        else {
            return response()->json([
                'status'           => "SUCCESS",
                'satisfactor' => $story->downvote(),
                'userSatisfactor'  => Satisfactor::UserVote($story, Auth::user())
            ]);
        }
    }
    /**
     * add a new line to an existing story
     * @param $request - Post Request information
     * @param $story - The story to add the line too
     * @return back to the story
     */
    function addLine(Request $request, Story $story) {
        $line = new Line();
        $line->content = $request->line;
        $line->user_id = Auth::user()->id;
        $line->parent_id = $story->lines()->latest()->first()->id;
        $story->lines()->save($line);
        return redirect()->back()->with('message', 'Line Added Successfully!');
    }
    function lastLine(Story $story) {
        return response()->json([
            'status'    => "SUCCESS",
            'lastline'  => $story->lines()->latest()->first()->id
        ]);
    }

    function newLines(Request $request, Story $story) {
        $lines = [];
        foreach($story->lines->where('id','>',$request->lastline) as $line) {
            $lines[] = [
                "id"       =>$line->id,
                "content"  =>$line->showContent(),
                "pen_name" => $line->author->pen_name
            ];
        }
        return response()->json([
            'status'    => "SUCCESS",
            'lastline'  => $story->lines()->latest()->first()->id,
            'lines'  => $lines
        ]);
    }
}
