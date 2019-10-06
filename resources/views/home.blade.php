@extends('layouts.app')
@section('meta.title', "Tales Collective - You Decide What Happens Next")
@section('meta.description', "Tales Collective - You Decide What Happens Next")
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-8">
            <h1>Your latest stories on Tales Collective</h1>
            <div class="top-rated">
                <ul>
                    @each('layouts.story', $stories, 'story')
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
