@extends('layouts.admin')

@section("tab-content")
<div id="profile" class="tab-pane fade in active">
    <div class="view-profile">
        <article class="image-box style2 box innerstyle personal-details">
            <figure>
                <a title="" href="#"><img width="270" height="300" alt="" src="https://picsum.photos/270/300?image=856"></a>
            </figure>
            <div class="details">
                <a href="#" class="button btn-mini pull-right edit-profile-btn">EDIT PROFILE</a>
                <h2 class="box-title fullname">{{ $customerData['firstName'] }} {{ $customerData['lastName'] }}</h2>
                <dl class="term-description">
                    <dt>user name:</dt><dd>{{ $customerData['email'] }}</dd>
                    <dt>first name:</dt><dd>{{ $customerData['firstName'] }}</dd>
                    <dt>last name:</dt><dd>{{ $customerData['lastName'] }}</dd>
                    <dt>phone number:</dt><dd>{{ $customerData['contact_number'] }}</dd>
                    <dt>Date of birth:</dt><dd>{{ $customerData['dob'] }}</dd>
                    <dt>Gender:</dt><dd>{{ $customerData['gender'] }}</dd>
                    <dt>Skype ID:</dt><dd>{{ $customerData['skype_id'] }}</dd>
                    <dt>Facebook ID:</dt><dd>{{ $customerData['facebook_id'] }}</dd>
                    <dt>Country:</dt><dd>{{ $customerData['current_country'] }}</dd>
                    <dt>Permanent Residence:</dt><dd>{{ $customerData['permanent_residence'] }}</dd>
                </dl>
            </div>
        </article>
        <hr>
    </div>
    <div class="edit-profile">
      <form class="edit-profile-form" method="post" action="{{ route('customer.update.submit')}}">
          {{ csrf_field() }}
          <h2>Personal Details</h2>
          <div class="col-sm-9 no-padding no-float">
              <div class="row form-group">
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                      <label>First Name</label>
                      <input id="first_name" type="text" class="input-text full-width" name="first_name" value="{{ old('first_name') }}" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32'>

                      @if ($errors->has('first_name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('first_name') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                      <label>Last Name</label>
                      <input id="last_name" type="text" class="input-text full-width" name="last_name" value="{{ old('last_name') }}" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32'>

                      @if ($errors->has('last_name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('last_name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                      <label>Gender</label>
                      <select id="gender" class="input-text full-width" name="gender">
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
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                      <label>Date of Birth</label>
                      <input id="dob" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="input-text full-width" name="dob" value="{{ old('dob') }}">

                      @if ($errors->has('dob'))
                          <span class="help-block">
                              <strong>{{ $errors->first('dob') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="row form-group">
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label>New Password</label>
                      <input id="password" type="password" class="input-text full-width" name="password">

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="col-sms-6 col-sm-6 form-group">
                      <label>Confirm Password</label>
                      <input id="password-confirm" type="password" class="input-text full-width" name="password_confirmation">
                  </div>
              </div>
              <hr>
              <h2>Contact Details</h2>
              <div class="row form-group">
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
                      <label>Phone Number</label>
                      <input id="contact_number" type="text" class="input-text full-width" name="contact_number" value="{{ old('contact_number') }}" pattern="[0-9]*" title="Digits Only" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>

                      @if ($errors->has('contact_number'))
                          <span class="help-block">
                              <strong>{{ $errors->first('contact_number') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('skype_id') ? ' has-error' : '' }}">
                      <label>Skype ID (optional)</label>
                      <input id="skype_id" type="text" class="input-text full-width" name="skype_id" value="{{ old('skype_id') }}">

                      @if ($errors->has('skype_id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('skype_id') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('facebook_id') ? ' has-error' : '' }}">
                      <label>Facebook ID (optional)</label>
                      <input id="facebook_id" type="text" class="input-text full-width" name="facebook_id" value="{{ old('facebook_id') }}">

                      @if ($errors->has('facebook_id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('facebook_id') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('current_country') ? ' has-error' : '' }}">
                      <label>Current Country</label>
                      <div class="selector">
                          <select id="current_country" class="full-width" name="current_country" value="Male">
                              <option value="">Choose...</option>
                              @foreach ($countries as $key => $value)
                                  <option
                                      @if(old('current_country') == $key)
                                          selected
                                      @endif
                                      value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                          </select>
                      </div>

                      @if ($errors->has('current_country'))
                          <span class="help-block">
                              <strong>{{ $errors->first('current_country') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('permanent_residence') ? ' has-error' : '' }}">
                      <label>Country</label>
                      <input id="permanent_residence" type="text" class="input-text input-large full-width" name="permanent_residence" value="{{ old('permanent_residence') }}" placeholder="e.g. 123, address, street, cilty, country.">

                      @if ($errors->has('permanent_residence'))
                          <span class="help-block">
                              <strong>{{ $errors->first('permanent_residence') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <hr>
              <!--
              <h2>Upload Profile Photo</h2>
              <div class="row form-group">
                  <div class="col-sms-12 col-sm-6 no-float">
                      <div class="fileinput full-width">
                          <input type="file" class="input-text" data-placeholder="select image/s">
                      </div>
                  </div>
              </div>
              <hr>-->
              <div class="from-group">
                  <button type="submit" class="btn-medium col-sms-6 col-sm-4">UPDATE SETTINGS</button>
                  <button type="button" class="btn-medium btn-danger col-sms-6 col-sm-4 btnCancel"><a href="{{ route('customer.profile') }}">Cancel</a></button>
              </div>


          </div>
      </form>
    </div>
</div>
@endsection
