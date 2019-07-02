@extends('layouts.auth')

@section('content')
<p class="light-blue-color block" style="font-size: 1.3333em;">Reset Password</p>
<div class="col-sm-8 col-md-6 col-lg-5 no-float no-padding center-block">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="login-form" method="POST" action="{{ route('customer.password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="input-text input-large full-width" name="email" value="{{ old('email') }}" placeholder="enter your email" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn-large full-width sky-blue1">Send Password Reset Link</button>
    </form>
</div>
@endsection
