@extends('layouts.app')
@section('meta.title', $title . " by You!")
@section('meta.description', "Add your stories title!")

@section('body-class', "writing")
@section('content')
<div class="wrapper tales-intro">
	<p>
		{{ $title }}
	</p>
	<form action="{{ route('intro.author.save') }}" method="post">
        <p class="intro">
            by... Uhh wait a minute, your story doesn't have an author, that just won't do! After all how will any one know who made this epic tale!
        </p>
        <input type="text" placeholder="Your Name" name="name" required/>
        <input type="text" placeholder="Your Email" name="email" required/>
        <button class="btn btn-success">
            Claim My Tale
        </button>
        @csrf
	</form>
</div>
@endsection
@section('js.bottom')
<script src="{{ asset('js/intro-start.js') }}"></script>
