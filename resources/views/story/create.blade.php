@extends('layouts.app')
@section('meta.title', "Create a new story")
@section('meta.description', "Create a new story")
@section('content')
<div class="wrapper">
	<div class="box">
        <h1>
            Add a New Story
        </h1>
        <p>
            Add your story, and watch it grow!  Once you submit your story you can view who's written what by accessing your profile.
        </p>
        <form action="{{ route('story.save') }}" method="post">
            @csrf
            <div class="form-row">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title">
            </div>
            <div class="form-row">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Description" rows="4"></textarea>
            </div>
            <div class="form-row">
                <label>Rating</label>
								<ul id="rating-scale">
									<li class="general" data-rating="general"><span></span></li>
									<li class="pg active" data-rating="pg"><span></span></li>
									<li class="adult" data-rating="adult"><span></span></li>
									<li class="restricted" data-rating="restricted"><span></span></li>
								</ul>
								<ul id="rating-definitions">
									<li class="general"><strong>General:</strong> This story can be read and added to by anyone.</li>
									<li class="pg active"><strong>PG:</strong> This story contains some mature undertones, audience should be 13 or above.</li>
									<li class="adult"><strong>Adult:</strong> This story contains mature content, violence, or language not suitable for anyone under the age of 18.</li>
									<li class="restricted"><strong>Restricted:</strong> Story contains graphic depictions of violence, gore, sexual misconduct or other imagry not suited to a wide audience.</li>
								</ul>
            </div>
            <div class="form-row">
                <label for="first-line">First Line</label>
                <textarea id="first-line" name="firstline" placeholder="First Line" rows="10"></textarea>
								<div class="suggestion">
									<div><!-- This div apologizes for its existence, and blames the CSS float system. -->
										<p><strong>Not sure what to write? Here's a random story starter to spark your creativity!</strong></p>
										<p id="suggestion">{{ $intro }}</p>
										<p style="text-align:right"><button class="btn btn-primary" id="use-suggest" type="button">Use Suggestion</button></p>
									</div>
								</div>
            </div>
			<div class="form-row">
                <label for="line-limit">Line Limit</label>
                <select name="line-limit" id="line-limit">
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="500">500</option>
					<option value="-1">FOREVER</option>
				</select>
            </div>
			<div class="form-row">
                <label for="time-limit">Line Time Limit</label>
                <select name="time-limit" id="time-limit">
					<option value="300" default>5 minutes</option>
					<option value="600">10 minutes</option>
					<option value="1800">30 minutes</option>
					<option value="3600">1 hour</option>
				</select>
            </div>
            <div class="form-group">
                <button type="submit" class="action-button">
                    Add My Story!
                </button>
            </div>
            @csrf
			<input type="hidden" name="rating" value="pg" id="hidden-rating" />
        </form>
    </div>
</div>
@endsection
@section('js.bottom')
<script src="{{ asset('js/addSuggest.js') }}"></script>
<script src="{{ asset('js/storyRating.js') }}"></script>
@endsection