@extends('layouts.admin')

@section("tab-content")
<div id="PersonalDocuments" class="tab-pane fade in active">
    <h1>Personal Documents</h1>
    <h2>Upload your documents here:</h2>

    <form method="post" enctype="multipart/form-data" action="{{ route('customer.docs.upload') }}">
       {{ csrf_field() }}
       <div class="row form-group">
           <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('cnic[]') ? ' has-error' : '' }}">
               <label>CNIC</label>
               <div class="fileinput full-width">
                   <input type="file" class="input-text" data-placeholder="Back & Front (2 images)" name="cnic[]" multiple required>
               </div>

               @if ($errors->has('cnic[]'))
                   <span class="help-block">
                       <strong>{{ $errors->first('cnic[]') }}</strong>
                   </span>
               @endif
           </div>
           <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('passport[]') ? ' has-error' : '' }}">
               <label>Passport</label>
               <div class="fileinput full-width">
                   <input type="file" class="input-text" data-placeholder="2 Front & 1 Back (3 images)" name="passport[]" multiple required>
               </div>

               @if ($errors->has('passport[]'))
                   <span class="help-block">
                       <strong>{{ $errors->first('passport[]') }}</strong>
                   </span>
               @endif
           </div>
       </div>
       <div class="row form-group">
           <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('visa') ? ' has-error' : '' }}">
               <label>VISA</label>
               <div class="fileinput full-width">
                   <input type="file" class="input-text" data-placeholder="1 image" name="visa" required>
               </div>

               @if ($errors->has('visa'))
                   <span class="help-block">
                       <strong>{{ $errors->first('visa') }}</strong>
                   </span>
               @endif
           </div>
           <div class="col-sms-6 col-sm-6 form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
               <label>Picture (passport size)</label>
               <div class="fileinput full-width">
                   <input type="file" class="input-text" data-placeholder="1 image" name="picture" required>
               </div>

               @if ($errors->has('picture'))
                   <span class="help-block">
                       <strong>{{ $errors->first('picture') }}</strong>
                   </span>
               @endif
           </div>
       </div>
       <div class="from-group">
           <button type="submit" class="btn-block col-sms-12 col-sm-12">UPLOAD</button>
       </div>
    </form>
    </hr>
</div>
@endsection
