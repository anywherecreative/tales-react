@extends('layouts.app')
@section('meta.title', "The Untitled Tale")
@section('meta.description', "Give your tale a title")
@section('body-class', "writing")
@section('content')
<div class="wrapper tales-intro">
	<p class="intro">
        {{ $providedLine }} <span class="user-line" title="Added by you!"> {{ $intro }}</span>
	</p>
    <form action="{{ route('intro.title.save') }}" method="post">
    	<div class="emphasized">
            <p>
                Congrats! You just started your first story! Easy right?  Now you just need to give your new story a name,
                every good story needs a name after all!
            </p>
        </div>
        <input type="text" placeholder="Title" name="title" required="required"/>
        <button class="btn btn-success">
            Add Your Title
        </button>
        @csrf
    </form>
</div>
@endsection
@section('js.bottom')
<script src="{{ asset('js/intro-start.js') }}"></script>
