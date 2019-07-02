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
                            <span class="caption-subject sbold uppercase"><h2 style="color:#28B6E9;"><i class="icon-settings"></i><strong>Airlines</strong></h2></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Image </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($airlines as $airline)
                                  <tr>
                                      <td> {{ $airline->id }} </td>
                                      <td> {{ $airline->name }} </td>
                                      <td> <img src="{{ URL::asset('/' . $airline->image) }}" alt="{{ $airline->name }}" height="50" align="middle" style="display:block; margin:auto;"/> </td>
                                      <td>
                                          <form action="{{ url('update_airline') }}" id="update-form-airline-{{ $airline->id }}" method="get">
                                                <input type="hidden" name="update_id" value="{{ $airline->id }}"/>
                                                <input type="hidden" name="update_name" value="airline"/>
                                            </form>
                                            <a class="fa fa-edit" href="{{ url('update_airline') }}" onclick="event.preventDefault();
                                                document.getElementById('update-form-airline-{{ $airline->id }}').submit();">
                                            </a>
                                      </td>
                                      <td>
                                            <a href="#" data-href="{{ url('del_airline') }}" data-toggle="modal" data-target="#confirm-airline-delete-{{ $airline->id }}" class="fa fa-times"></a>

                                            <div class="modal fade" id="confirm-airline-delete-{{ $airline->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                                <div class="modal-dialog">
                                                    <div style="margin: 40px;">
                                                        <form action="{{ url('del_airline') }}" id="delete-form-airline-{{ $airline->id }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="airline_del_id" value="{{ $airline->id }}"/>
                                                        </form>
                                                        <p>
                                                            <strong style="font-size: 1.3em; color: #fff;">Are you sure you want to DELETE this Airline ? </strong>
                                                        </p>
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <a class="btn btn-danger btn-block btn-ok" href=""    onclick="event.preventDefault();
                                                                document.getElementById('delete-form-airline-{{ $airline->id }}').submit();">Yes</a>
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
