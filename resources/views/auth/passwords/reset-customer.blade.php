@extends('layouts.auth')

@section('content')
<p class="light-blue-color block" style="font-size: 1.3333em;">Reset Password</p>
<div class="col-sm-8 col-md-6 col-lg-5 no-float no-padding center-block">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form class="login-form" method="POST" action="{{ route('customer.password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="input-text input-large full-width" name="email" value="{{ $email or old('email') }}" placeholder="E-Mail Address" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="input-text input-large full-width" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input id="password-confirm" type="password" class="input-text input-large full-width" name="password_confirmation" placeholder="Confirm Password" required>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn-large full-width sky-blue1">Reset Password</button>
    </form>
</div>
@endsection
