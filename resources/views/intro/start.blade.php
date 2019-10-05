@extends('layouts.app')
@section('meta.title', "Tales Collective - You Decide What Happens Next")
@section('meta.description', "Create a story, or add to someone else's. Tales Collective is a collaborative story platform where you decide what happens next.")
@section('body-class', "writing")
@section('content')
<div class="wrapper tales-intro">
	<p style="text-align:center"><img src="{{ asset('images/inkpot.png')}}" alt="Feather Quill in an Ink Pot" /></p>
	<form action="{{ route('intro.line.save') }}" method="post">
        <p class="intro">
            {{ $intro }}
        </p>
        <textarea type="text" name="intro" placeholder="You Decide what happens next!" required></textarea>
        <button type="submit" class="btn btn-success">
            Add Your Line!
        </button>
        @csrf
    </form>
    <p style="text-align:center;margin-top:30px;"><a href="{{ route('story.top') }}">I'm not feeling very creative today...</a></p>
</div>
@endsection
@section('js.bottom')
<script src="{{ asset('js/intro-start.js') }}"></script>
