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
                            <span class="caption-subject sbold uppercase"><h2 style="color:#28B6E9;"><i class="icon-settings"></i><strong>Continents</strong></h2></span>
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
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($continents as $continent)
                                  <tr>
                                      <td> {{ $continent->id }} </td>
                                      <td> {{ $continent->name }} </td>
                                      <td> <img src="{{ URL::asset('/' . $continent->image) }}" alt="{{ $continent->name }}" height="50" align="middle" style="display:block; margin:auto;"/> </td>
                                      <td> {{ $continent->page_title }} </td>
                                      <td> {{ $continent->header_keywords }} </td>
                                      <td> {{ $continent->body_keywords }} </td>
                                      <td> {{ str_limit($continent->body_content, 80) }} </td>
                                      <td> {{ $continent->meta_title }} </td>
                                      <td> {{ $continent->meta_description }} </td>
                                      <td> {{ $continent->meta_keywords }} </td>
                                      <td>
                                          <form action="{{ url('update_continent') }}" id="update-form-continent-{{ $continent->id }}" method="get">
                                              <input type="hidden" name="update_id" value="{{ $continent->id }}"/>
                                              <input type="hidden" name="update_name" value="continent"/>
                                          </form>
                                          <a class="fa fa-edit" href="{{ url('update_continent') }}" onclick="event.preventDefault();
                                              document.getElementById('update-form-continent-{{ $continent->id }}').submit();">
                                          </a>
                                      </td>
                                      <td>
                                            <a href="#" data-href="{{ url('del_continent') }}" data-toggle="modal" data-target="#confirm-continent-delete-{{ $continent->id }}" class="fa fa-times"></a>

                                            <div class="modal fade" id="confirm-continent-delete-{{ $continent->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                                <div class="modal-dialog">
                                                    <div style="margin: 40px;">
                                                        <form action="{{ url('del_continent') }}" id="delete-form-continent-{{ $continent->id }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="continent_del_id" value="{{ $continent->id }}"/>
                                                        </form>
                                                        <p>
                                                            <strong style="font-size: 1.3em; color: #fff;">Are you sure you want to DELETE this Continent ? </strong>
                                                        </p>
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <a class="btn btn-danger btn-block btn-ok" href="{{ url('view_continent') }}"    onclick="event.preventDefault();
                                                                document.getElementById('delete-form-continent-{{ $continent->id }}').submit();">Yes</a>
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
