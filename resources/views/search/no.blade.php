@extends('layouts.app')
@section('meta.title', "Search")
@section('meta.description', "Search Tales Collective")
@section('content')
<div class="wrapper search-page">
    <div class="wrapper search-page">
        <div class="box">
            <h2>Fine then, don't search for things.</h2>
                <p><a href="{{ route('search.results',['do'=>'1','term'=>"no"]) }}">But I want to</a></p>
        </div>
    </div>
</div>