@extends('layouts.auth')

@section('content')
<p class="light-blue-color block" style="font-size: 1.3333em;">Please login to your ADMIN account.</p>
<div class="col-sm-8 col-md-6 col-lg-5 no-float no-padding center-block">
    <form class="login-form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="input-text input-large full-width" name="email" value="{{ old('email') }}" placeholder="enter your email" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" name="password" class="input-text input-large full-width" placeholder="enter your password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label class="checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
        </div>

        <button type="submit" class="btn-large full-width sky-blue1">LOGIN TO YOUR ACCOUNT</button>
        <a class="btn btn-link" href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>
    </form>
</div>
@endsection
