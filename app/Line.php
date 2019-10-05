<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Line extends Model
{
    use Searchable;

    public function parent()
    {
        return $this->belongsTo('App\Line', 'parent_id');
    }

    public function story() {
        return $this->belongsTo('App\Story');
    }

    public function author() {
        return $this->belongsTo('App\User','user_id');
    }

    public function showContent() {
        return "<p>" . str_replace(PHP_EOL,"</p><p>",trim($this->content)) . "</p>";
    }

    public function toSearchableArray() {
        $array = $this->toArray();
        return $array;
    }
}
