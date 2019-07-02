@extends('layouts.admin')

@section("tab-content")

    @include('dashboard.manageFlights')

    <div id="Continents" class="tab-pane fade in active">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject sbold uppercase"><h2 style="color:#28B6E9;"><i class="icon-settings"></i><strong>Cities</strong></h2></span>
                        </div>
                    </div>
                    <div class="portlet-body" style="overflow: auto">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                        <table class="table table-responsive table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Image </th>
                                    <th> Page Title </th>
                                    <th> Header Keywords </th>
                                    <th> Body Keywords </th>
                                    <th> Body Content </th>
                                    <th> Meta Title </th>
                                    <th> Meta Description </th>
                                    <th> Meta Keywords </th>
                                    <th> Continent Name </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($cities as $city)
                                  <tr>
                                      <td> {{ $city->id }} </td>
                                      <td> {{ $city->name }} </td>
                                      <td> <img src="{{ URL::asset('/' . $city->image) }}" alt="{{ $city->name }}" height="50" align="middle" style="display:block; margin:auto;"/> </td>
                                      <td> {{ $city->page_title }} </td>
                                      <td> {{ $city->header_keywords }} </td>
                                      <td> {{ $city->body_keywords }} </td>
                                      <td> {{ str_limit($city->body_content, 80) }} </td>
                                      <td> {{ $city->meta_title }} </td>
                                      <td> {{ $city->meta_description }} </td>
                                      <td> {{ $city->meta_keywords }} </td>
                                      <td> {{ $city->continent_name }} </td>
                                      <td>
                                          <form action="{{ url('update_cities') }}" id="update-form-city-{{ $city->id }}" method="get">
                                                <input type="hidden" name="update_id" value="{{ $city->id }}"/>
                                                <input type="hidden" name="update_name" value="city"/>
                                            </form>
                                            <a class="fa fa-edit" href="{{ url('update_cities') }}" onclick="event.preventDefault();
                                                document.getElementById('update-form-city-{{ $city->id }}').submit();">
                                            </a>
                                      </td>
                                      <td>
                                            <a href="#" data-href="{{ url('del_city') }}" data-toggle="modal" data-target="#confirm-city-delete-{{ $city->id }}" class="fa fa-times"></a>

                                            <div class="modal fade" id="confirm-city-delete-{{ $city->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                                <div class="modal-dialog">
                                                    <div style="margin: 40px;">
                                                        <form action="{{ url('del_city') }}" id="delete-form-city-{{ $city->id }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="city_del_id" value="{{ $city->id }}"/>
                                                        </form>
                                                        <p>
                                                            <strong style="font-size: 1.3em; color: #fff;">Are you sure you want to DELETE this City ? </strong>
                                                        </p>
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <a class="btn btn-danger btn-block btn-ok" href=""    onclick="event.preventDefault();
                                                                document.getElementById('delete-form-city-{{ $city->id }}').submit();">Yes</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      </td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
@endsection
