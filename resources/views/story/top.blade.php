@extends('layouts.app')
@section('meta.title', "Top Rated")
@section('meta.description', "Top Rated Stories")
@section('content')
<div class="wrapper top-rated">
        <h1>Top Rated Stories</h1>
        <ul>
        @each('layouts.story', $stories, 'story')
        </ul>
	</div>
</div>