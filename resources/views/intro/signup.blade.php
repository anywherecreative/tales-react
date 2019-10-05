@extends('layouts.app')
@section('meta.title', "Welcome, " . $firstName)
@section('meta.description', "Signup Today!")
@section('body-class', "writing")
@section('content')
<div class="wrapper tales-intro">
    <h1>
    Welcome, {{ $firstName }}!
	</h1>
	<form action="{{ route('intro.signup.save') }}" method="post">
        <p>
            That's all there is too it! You started your first story. Tales Collective is about authors collaborating
            to create amazing tales! Once you signup for an account your story will be published so other's can add to them too!
        </p>

		<input type="text" name="penname" placeholder="Pen Name"  />
		<input type="password" name="pass1" placeholder="Password" >
		<input type="password" name="pass2" placeholder="Confirm Password" >
		<button type="submit">
			Sign Up!
        </button>
        @csrf
	</form>
</div>
@endsection
@section('js.bottom')
<script src="{{ asset('js/intro-start.js') }}"></script>
