@extends('layouts.app')
@section('meta.title', "Search results for " . $term)
@section('meta.description', "Search Tales Collective")
@if($term == "brony" || $term == "bronies")
@section('body-class', 'brony' )
@endif
@section('content')
<div class="wrapper search-page">
	<div class="box">
        <form action="{{ route('search.results') }}">
                <input type="text" name="term" value="{{ $term }}" />
                <button type="submit">
                    Search
                </button>
            </form>
        </div>
            <h1>Results for {{ $term }}:</h1>
            <ul>
                 @each('layouts.story', $stories, 'story')
            </ul>
	</div>
</div>