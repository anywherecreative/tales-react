@extends('layouts.app')
@section('meta.title', "Welcome Back!")
@section('meta.description', "Login To Tales Collective")
@section('content')
    <div class=" login">
        <div class="box">
            <h1>{{ __('Login') }}</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-row">
                    <label for="email">{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-row">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-row">
                    <input type="checkbox" name="remember" id="keep" {{ old('remember') ? 'checked' : '' }}>
                    <label class='cl' for="keep">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="form-row">
                    <button type="submit" class="action-button">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
            <p><a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a></p>
            <p>{{ __('Don\'t have an account yet?') }} <a href="user/register">{{ __('Sign up here!') }}</a></p>
        </div>
    </div>
@endsection
