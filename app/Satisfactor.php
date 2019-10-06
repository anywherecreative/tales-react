<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Satisfactor extends Model
{
    protected function setKeysForSaveQuery(\Illuminate\Database\Eloquent\Builder $query) {
        $query
            ->where('story_id', '=', $this->getAttribute('story_id'))
            ->where('user_id', '=', $this->getAttribute('user_id'));
        return $query;
    }

    const UPVOTE   = 1;
    const DOWNVOTE = -1;
    const NOVOTE   = 0;

    public static function UserVote(Story $story, User $user) {
        $satisfactor = Satisfactor::where('user_id','=',$user->id)->where('story_id','=',$story->id)->first();
        if($satisfactor == null) {
            return 0;
        }
        else {
            return $satisfactor->vote;
        }
    }
}
