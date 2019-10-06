@extends('layouts.app')
@section('meta.title', "No Results for " . $term)
@section('meta.description', "No Results for " . $term)

@if($term == "brony" || $term == "bronies")
@section('body.class', 'brony' )
@endif
@section('content')
<div class="wrapper search-page">
    <div class="box">
        <h1>Poop. We couldn't find {{ $term }}.</h1>
        <p>Maybe try something else?</p>
        <form action="{{ route('search.results') }}">
            <input type="text" name="term" value="" />
            <button type="submit">
                Search
            </button>
        </form>
    </div>
</div>