<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intro;
use App\Starter;
use App\User;
use App\Story;
use Hash;
use Auth;
use Session;
use App\Line;
use Illuminate\Support\Facades\Redirect;

class IntroController extends Controller
{
    function start() {
        $intro = Intro::getLine();
        Session::put('provided-line', $intro);
        return view('intro.start')->withIntro($intro);
    }

    function lineSave(Request $request) {
        $starter = New Starter();
        $starter->intro = $request->intro;
        $starter->provided_line = Session::get('provided-line');
        $starter->save();
        Session::put('starter',$starter->id);
        return Redirect::route('intro.title');
    }

    function addTitle() {
        if(Session::get('starter') == null) {
            return Redirect::route('home');
        }
        $starter = Session::get('starter');
        $starter = Starter::find($starter);
        return view('intro.title')->withProvidedLine($starter->provided_line)->withIntro($starter->intro);
    }

    function titleSave(Request $request) {
        $starter = Session::get('starter');
        $starter = Starter::find($starter);
        $starter->title = $request->title;
        $starter->step = Starter::INTRO_AUTHOR;
        $starter->save();
        return Redirect::route('intro.author');
    }

    function addAuthor() {
        if(Session::get('starter') == null) {
            return Redirect::route('home');
        }
        $starter = Session::get('starter');
        $starter = Starter::find($starter);
        if($starter->step != Starter::INTRO_AUTHOR) {
            return Redirect::route('home');
        }
        return view('intro.author')->withTitle($starter->title);
    }

    function authorSave(request $request) {
        $validatedData = $request->validate([
            'name'            => 'required',
            'email'           => 'required|unique:users,email'],[
            'name.required'   => 'You must provide a name!',
            'email.required'  => 'The must provide an email!',
            'email.unique'    => 'Looks like you have an account already!',
        ]);
        $starter = Session::get('starter');
        $starter = Starter::find($starter);
        $starter->first_name = $request->name;
        $starter->email = $request->email;
        $starter->step = Starter::INTRO_SIGNUP;
        $starter->save();
        return Redirect::route('intro.signup');
    }

    function signup() {
        if(Session::get('starter') == null) {
            return Redirect::route('home');
        }
        $starter = Session::get('starter');
        $starter = Starter::find($starter);
        if($starter->step != Starter::INTRO_SIGNUP) {
            return Redirect::route('home');
        }
        return view('intro.signup')->withFirstName($starter->first_name);
    }

    function signupSave(Request $request) {
        $validatedData = $request->validate([
            'pass1'            => 'required|same:pass2',
            'penname'          => 'required|unique:users,pen_name'],[
            'pass1.required'   => 'A Password is required',
            'pass1.same'       => 'The Passwords Don\'t Match',
            'penname.required' => 'You Must Provide a Pen Name',
        ]);
        $starter = Session::get('starter');
        $starter = Starter::find($starter);

        $user = new User();
        $user->name     = $starter->first_name;
        $user->email    = $starter->email;
        $user->pen_name = $request->penname;
        $user->password = Hash::make($request->pass1);
        $user->save();
        Auth::login($user);
        $story = new Story();
        $story->title = $starter->title;
        $story->rating = Story::RATING_PG;
        $story->description = "Story Created by intro Generator";
        $story->user_id = $user->id;
        $story->save();
        $line = new Line();
        $line->user_id = $user->id;
        $line->story_id = $story->id;
        $line->content = $starter->provided_line . " " . $starter->intro;
        $line->save();
        return Redirect::route('story.view',['story'=>$story]);
    }
}
