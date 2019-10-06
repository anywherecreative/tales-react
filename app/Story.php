<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Auth;
use Carbon\Carbon;

class Story extends Model
{
    use Searchable;
    const RATING_G  = 0;
    const RATING_PG = 1;
    const RATING_A  = 2;
    const RATING_R  = 3;
    
    public function lines()
    {
        return $this->hasMany('App\Line');
    }

    public function author()
    {
        return $this->belongsTo('App\User','user_id');
    }

    function satisfactor() {
        return $this->hasMany('App\Satisfactor');
    }

    function upvote() {
        $satisfactor = Satisfactor::where('user_id','=', Auth::id())->where('story_id','=',$this->id)->first();
        if($satisfactor == null) {
            $satisfactor = new Satisfactor();
            $satisfactor->user_id = Auth::id();
            $satisfactor->story_id = $this->id;
            $satisfactor->vote = Satisfactor::UPVOTE;
            $satisfactor->save();
            return Satisfactor::UPVOTE;
        }
        elseif($satisfactor->vote == Satisfactor::DOWNVOTE) {
            $satisfactor->vote = Satisfactor::UPVOTE;
            $satisfactor->save();
            return Satisfactor::UPVOTE;
        }
        else  {
            $satisfactor->delete();
            return Satisfactor::NOVOTE;
        }
    }

    function downvote() {
        $satisfactor = Satisfactor::where('user_id','=', Auth::id())->where('story_id','=',$this->id)->first();
        if($satisfactor == null) {
            $satisfactor = new Satisfactor();
            $satisfactor->user_id = Auth::id();
            $satisfactor->story_id = $this->id;
            $satisfactor->vote = Satisfactor::DOWNVOTE;
            $satisfactor->save();
            return Satisfactor::DOWNVOTE;
        }
        elseif($satisfactor->vote == Satisfactor::UPVOTE) {
            $satisfactor->vote = Satisfactor::DOWNVOTE;
            $satisfactor->save();
            return Satisfactor::DOWNVOTE;
        }
        else  {
            $satisfactor->delete();
            return Satisfactor::NOVOTE;
        }
    }

    function getTotalSatisfactorAttribute() {
        return $this->satisfactor->sum('vote');
    }

    public static function getRatingConstant($rating) {
        switch($rating) {
            case 'general':
                $rating = Story::RATING_G;
                break;
            case 'pg':
                $rating = Story::RATING_PG;
                break;
            case 'adult':
                $rating = Story::RATING_A;
                break;
            case 'restricted':
                $rating = Story::RATING_R;
                break;
            default:
                $rating = Story::RATING_PG;
                break;
        }
    }

    function getWeightedSatisfactorAttribute() {
        $storyDate = Carbon::parse($this->created_at);
        $factor = $storyDate->diffInDays(Carbon::now());
        if($factor <= 1) {
            return $this->total_satisfactor;
        }
        else {
            return ceil($this->total_satisfactor/($factor*.8));
        }
    }

    public function toSearchableArray() {
        $array = $this->toArray();
        return $array;
    }
}
