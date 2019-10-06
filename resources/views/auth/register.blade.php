@extends('layouts.app')
@section('meta.title', "Create An Account")
@section('meta.description', "Create an account on Tales Collective - The Collaborative story writing site")
@section('content')
    <div class=" register">
        <div class="box">
            <h1>{{ __('Register') }}</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-row">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                    @endif
                </div>

                <div class="form-row">
                    <label for="pen_name">{{ __('Pen Name') }}</label>
                    <input id="pen_name" type="text" class="{{ $errors->has('pen_name') ? ' is-invalid' : '' }}" name="pen_name" value="{{ old('pen_name') }}" required>
                    @if ($errors->has('pen_name'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pen_name') }}</strong>
                                </span>
                    @endif
                </div>

                <div class="form-row">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                    @endif
                </div>

                <div class="form-row">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                    @endif
                </div>

                <div class="form-row">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="" name="password_confirmation" required>
                </div>

                <div class="form-row">
                    <button type="submit" class="action-button">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
