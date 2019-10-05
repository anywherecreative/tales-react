<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Starter extends Model
{
    const INTRO_AUTHOR = 3;
    const INTRO_SIGNUP = 4;

    public static function prune() {
        $starters = self::where('created_at', '<', Carbon::now()->subWeek(2)->toDateTimeString());
        $starters->delete();
    }
}
