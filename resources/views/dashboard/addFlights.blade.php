@extends('layouts.admin')

@section("page-level-style")
<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=v4bs0b54utk23j924z647170peonefh69rgcfks7pssm9uda'></script>
<script>
  tinymce.init({
    selector: '.text-editor',  // change this value according to your HTML
    plugins : 'advlist autolink link lists charmap print preview code textcolor',
    relative_urls : 0,
    remove_script_host : 0,
    toolbar: 'undo redo | forecolor backcolor | fontselect fontsizeselect | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | link code | bullist numlist outdent indent blockquote'
  });
</script>
@endsection

@section("tab-content")

<div id="addFlights" class="tab-pane fade in active">
    <h2 class="text-center">Flights</h2>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <h5 class="skin-color">Add Continent</h5>
            <form action="
                @if($update_data['continent']['id'])
                    add_continent/{{ $update_data['continent']['id'] }}
                @else
                    add_continent
                @endif"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="continent_name">Name</label>
                        <input type="text" name="continent_name" class="input-text full-width" value="{{ $update_data['continent']['name'] }}" required
                            @if($update_data['continent']['id'])
                                autofocus
                            @endif
                        >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="continent_img">Image</label>
                        <input type="file" name="continent_image" class="input-text full-width" @if(!$update_data['continent']['id']) required @endif>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="page_title">Page Title</label>
                        <input type="text" name="page_title" class="input-text full-width" placeholder="Type here..." value="{{ $update_data['continent']['page_title'] }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="header_keywords">Header Keywords</label>
                        <textarea name="header_keywords" rows="3" class="input-text full-width text-editor" placeholder="Type here..." >@if($update_data['continent']['header_keywords']){{ $update_data['continent']['header_keywords'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="body_keywords">Body Keywords</label>
                        <textarea name="body_keywords" rows="3" class="input-text full-width text-editor" placeholder="Type here...">@if($update_data['continent']['header_keywords']){{ $update_data['continent']['body_keywords'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="body_content">Body Content</label>
                        <textarea name="body_content" rows="3" class="input-text full-width text-editor" placeholder="Type here...">@if($update_data['continent']['header_keywords']){{ $update_data['continent']['body_content'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" rows="3" class="input-text full-width" placeholder="Type here...">@if($update_data['continent']['header_keywords']){{ $update_data['continent']['meta_title'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="input-text full-width" placeholder="Type here...">@if($update_data['continent']['header_keywords']){{ $update_data['continent']['meta_description'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="input-text full-width" placeholder="Type here...">@if($update_data['continent']['header_keywords']){{ $update_data['continent']['meta_keywords'] }}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    @if(!$update_data['continent']['id'])
                        <button class="btn-medium" id="add_continent">ADD</button>
                    @else
                        <button class="btn-medium btn-danger">Update</button>
                        <button class="btn-medium btnCancel" type="button"><a href="{{ url('continents') }}">Cancel</a></button>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6" style="border-left: #FDB714 2px dashed;">
            <h5 class="skin-color">Add City</h5>
            <form action="
                @if($update_data['city']['id'])
                    add_city/{{ $update_data['city']['id'] }}
                @else
                    add_city
                @endif"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="select_continent">Select continent</label>
                        <select class="input-text full-width" id="select_continent" name="select_continent" required
                            @if($update_data['city']['id'])
                                autofocus
                            @endif
                        >
                            <option value=""></option>
                            @foreach($continents as $continent)
                              <option
                                    @if($update_data['city']['continent_id'] == $continent->id)
                                        selected
                                    @endif
                                    value="{{ $continent->id }}"> {{ $continent->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="city_name">Name</label>
                        <input type="text" name="city_name" class="input-text full-width" value="{{ $update_data['city']['name'] }}" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="city_img">Image</label>
                        <input type="file" name="city_image" class="input-text full-width" @if(!$update_data['city']['id']) required @endif>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="page_title">Page Title</label>
                        <input type="text" name="page_title" class="input-text full-width" placeholder="Type here..." value="{{ $update_data['city']['page_title'] }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="header_keywords">Header Keywords</label>
                        <textarea name="header_keywords" rows="3" class="input-text full-width text-editor" placeholder="Type here...">@if($update_data['city']['header_keywords']){{ $update_data['city']['header_keywords'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="body_keywords">Body Keywords</label>
                        <textarea name="body_keywords" rows="3" class="input-text full-width text-editor" placeholder="Type here...">@if($update_data['city']['header_keywords']){{ $update_data['city']['body_keywords'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="body_content">Body Content</label>
                        <textarea name="body_content" rows="3" class="input-text full-width text-editor" placeholder="Type here...">@if($update_data['city']['header_keywords']){{ $update_data['city']['body_content'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" rows="3" class="input-text full-width" placeholder="Type here...">@if($update_data['city']['header_keywords']){{ $update_data['city']['meta_title'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="input-text full-width" placeholder="Type here...">@if($update_data['city']['header_keywords']){{ $update_data['city']['meta_description'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="input-text full-width" placeholder="Type here...">@if($update_data['city']['header_keywords']){{ $update_data['city']['meta_keywords'] }}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    @if(!$update_data['city']['id'])
                        <button class="btn-medium">ADD</button>
                    @else
                        <button class="btn-medium btn-danger">Update</button>
                        <button class="btn-medium btnCancel" type="button"><a href="{{ url('cities') }}">Cancel</a></button>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <h5 class="skin-color">Add Airport</h5>
            <form action="
                @if($update_data['airport']['id'])
                    add_airport/{{ $update_data['airport']['id'] }}
                @else
                    add_airport
                @endif"
                method="post">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="select_City">Select City</label>
                        <select class="input-text full-width" id="select_City" name="select_city" required
                            @if($update_data['airport']['id'])
                                autofocus
                            @endif
                        >
                            <option value=""></option>
                            @foreach($cities as $city)
                              <option
                                  @if($update_data['airport']['city_id'] == $city->id)
                                      selected
                                  @endif
                                  value="{{ $city->id }}"> {{ $city->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="airport_name">Name</label>
                        <input type="text" name="airport_name" class="input-text full-width" value="{{ $update_data['airport']['name'] }}" required>
                    </div>
                </div>
                <div class="form-group">
                    @if(!$update_data['airport']['id'])
                        <button class="btn-medium">ADD</button>
                    @else
                        <button class="btn-medium btn-danger">Update</button>
                        <button class="btn-medium btnCancel" type="button"><a href="{{ url('airports') }}">Cancel</a></button>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6" style="border-left: #FDB714 2px dashed;">
            <h5 class="skin-color">Add Airline</h5>
            <form action="
                @if($update_data['airline']['id'])
                    add_airline/{{ $update_data['airline']['id'] }}
                @else
                    add_airline
                @endif"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="airline_name">Name</label>
                        <input type="text" name="airline_name" class="input-text full-width" value="{{ $update_data['airline']['name'] }}" required
                            @if($update_data['airline']['id'])
                                autofocus
                            @endif
                        >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="airline_img">Image</label>
                        <input type="file" name="airline_image" class="input-text full-width" required>
                    </div>
                </div>
                <div class="form-group">
                    @if(!$update_data['airline']['id'])
                        <button class="btn-medium">ADD</button>
                    @else
                        <button class="btn-medium btn-danger">Update</button>
                        <button class="btn-medium btnCancel" type="button"><a href="{{ url('airlines') }}">Cancel</a></button>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <form action="
            @if($update_data['class']['id'])
                add_class/{{ $update_data['class']['id'] }}
            @else
                add_class
            @endif"
            method="post">
            {{ csrf_field() }}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h5 class="skin-color">Add Class</h5>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="class_name">Class Name</label>
                        <input type="text" name="class_name" class="input-text full-width" value="{{ $update_data['class']['name'] }}" required
                          @if($update_data['class']['id'])
                              autofocus
                          @endif
                        >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        @if(!$update_data['class']['id'])
                            <button class="btn-medium">ADD</button>
                        @else
                            <button class="btn-medium btn-danger">Update</button>
                            <button class="btn-medium btnCancel" type="button"><a href="{{ url('class') }}">Cancel</a></button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h5 class="skin-color">Add Route</h5>
            <form action="
                @if($update_data['route']['id'])
                    add_route/{{ $update_data['route']['id'] }}
                @else
                    add_route
                @endif"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="select_city">Select City</label>
                        <select class="input-text full-width" id="select_city" name="select_city" required>
                            <option value=""></option>
                            @foreach($cities as $city)
                              <option
                                  @if($update_data['route']['city'] == $city->id)
                                      selected
                                  @endif
                                  value="{{ $city->id }}"> {{ $city->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="from">From</label>
                        <select class="input-text full-width" id="from" name="from" required>
                            <option value=""></option>
                            @foreach($airports as $airport)
                              <option
                                  @if($update_data['route']['from_airport'] == $airport->id)
                                      selected
                                  @endif
                                  value="{{ $airport->id }}"> {{ $airport->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="select_airline">Select Airline</label>
                        <select class="input-text full-width" id="select_airline" name="select_airline" required>
                            <option value=""></option>
                            @foreach($airlines as $airline)
                              <option
                                  @if($update_data['route']['airline_id'] == $airline->id)
                                      selected
                                  @endif
                                  value="{{ $airline->id }}"> {{ $airline->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="select_class">Select Class</label>
                        <select class="input-text full-width" id="select_class" name="select_class" required>
                            <option value=""></option>
                            @foreach($classes as $class)
                              <option
                                  @if($update_data['route']['class_id'] == $class->id)
                                      selected
                                  @endif
                                  value="{{ $class->id }}"> {{ $class->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="input-text full-width" value="{{ $update_data['route']['price'] }}" required
                          @if($update_data['route']['id'])
                              autofocus
                          @endif
                        >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        @if(!$update_data['route']['id'])
                            <button class="btn-medium">ADD</button>
                        @else
                            <button class="btn-medium btn-danger">Update</button>
                            <button class="btn-medium btnCancel" type="button"><a href="{{ url('routes') }}">Cancel</a></button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--
<div class="modal" tabindex="-1" role="dialog" id="add_class">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="class">
          <div class="modal-body">
            <div class="form-body">
                <div class="form-group form-md-line-input" >
                    <label for="class_category">Class Name</label>
                    <input type="text" class="form-control" id="class_category" name="class_category" value="">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
            <input type="submit" data-dismiss="modal" class="btn btn-primary" id="add_class_category" value="Submit"/>
          </div>
      </form>
    </div>
  </div>
</div>
-->
@endsection
