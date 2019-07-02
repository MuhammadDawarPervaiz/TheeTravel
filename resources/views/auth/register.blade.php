@extends('layouts.auth')

@section('content')
<p class="light-blue-color block" style="font-size: 1.3333em;">Please Register.</p>
<div class="col-sm-8 col-md-6 col-lg-5 no-float no-padding center-block">
    <form class="login-form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <input id="first_name" type="text" class="input-text input-large full-width" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required autofocus>

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-6 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <input id="last_name" type="text" class="input-text input-large full-width" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required>

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
            <input id="dob" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="input-text input-large full-width" name="dob" value="{{ old('dob') }}" placeholder="D.O.B" required>

            @if ($errors->has('dob'))
                <span class="help-block">
                    <strong>{{ $errors->first('dob') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <select id="gender" class="input-text input-large full-width" name="gender" required>
                <option value="">Gender</option>
                @foreach ($genders as $key => $value)
                    <option
                        @if(old('gender') == $key)
                            selected
                        @endif
                        value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>

            @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
            <input id="contact_number" type="text" class="input-text input-large full-width" name="contact_number" value="{{ old('contact_number') }}" placeholder="Contact Number" pattern="[0-9]*" title="Digits Only" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>

            @if ($errors->has('contact_number'))
                <span class="help-block">
                    <strong>{{ $errors->first('contact_number') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="input-text input-large full-width" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required>

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

        <div class="form-group">
            <input id="password-confirm" type="password" class="input-text input-large full-width" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <div class="row">
            <div class="col-md-6 form-group{{ $errors->has('skype_id') ? ' has-error' : '' }}">
                <input id="skype_id" type="text" class="input-text input-large full-width" name="skype_id" value="{{ old('skype_id') }}" placeholder="Skype ID (optional)">

                @if ($errors->has('skype_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('skype_id') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-6 form-group{{ $errors->has('facebook_id') ? ' has-error' : '' }}">
                <input id="facebook_id" type="text" class="input-text input-large full-width" name="facebook_id" value="{{ old('facebook_id') }}" placeholder="Facebook ID (optional)">

                @if ($errors->has('facebook_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('facebook_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('current_country') ? ' has-error' : '' }}">
            <select id="current_country" class="input-text input-large full-width" name="current_country" value="Male" required>
                <option value="">Current Country</option>
                @foreach ($countries as $key => $value)
                    <option
                        @if(old('current_country') == $key)
                            selected
                        @endif
                        value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>

            @if ($errors->has('current_country'))
                <span class="help-block">
                    <strong>{{ $errors->first('current_country') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('permanent_residence') ? ' has-error' : '' }}">
            <input id="permanent_residence" type="text" class="input-text input-large full-width" name="permanent_residence" value="{{ old('permanent_residence') }}" placeholder="Permanent Residence (e.g. 123, address, street, cilty, country.)" required>

            @if ($errors->has('permanent_residence'))
                <span class="help-block">
                    <strong>{{ $errors->first('permanent_residence') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn-large full-width sky-blue1">
            Register
        </button>
    </form>
</div>
@endsection
