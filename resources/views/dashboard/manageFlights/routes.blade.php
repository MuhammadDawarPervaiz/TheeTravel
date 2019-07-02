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
                            <span class="caption-subject sbold uppercase"><h2 style="color:#28B6E9;"><i class="icon-settings"></i><strong>Routes</strong></h2></span>
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
                                    <th> City </th>
                                    <th> From </th>
                                    <th> Airline </th>
                                    <th> Price </th>
                                    <th> Class </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($routes as $route)
                                  <tr>
                                      <td> {{ $route->id }} </td>
                                      <td> {{ $route->city }} </td>
                                      <td> {{ $route->from }} </td>
                                      <td> <img src="{{ URL::asset('/' . $route->airline_image) }}" alt="{{ $route->airline_name }}" height="50" align="middle" style="display:block; margin:auto;"/> </td>
                                      <td> {{ $route->price }} </td>
                                      <td> {{ $route->class }} </td>
                                      <td>
                                          <form action="{{ url('update_route') }}" id="update-form-route-{{ $route->id }}" method="get">
                                                <input type="hidden" name="update_id" value="{{ $route->id }}"/>
                                                <input type="hidden" name="update_name" value="route"/>
                                            </form>
                                            <a class="fa fa-edit" href="{{ url('update_route') }}" onclick="event.preventDefault();
                                                document.getElementById('update-form-route-{{ $route->id }}').submit();">
                                            </a>
                                      </td>
                                      <td>
                                            <a href="#" data-href="{{ url('del_route') }}" data-toggle="modal" data-target="#confirm-route-delete-{{ $route->id }}" class="fa fa-times"></a>

                                            <div class="modal fade" id="confirm-route-delete-{{ $route->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                                <div class="modal-dialog">
                                                    <div style="margin: 40px;">
                                                        <form action="{{ url('del_route') }}" id="delete-form-route-{{ $route->id }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="route_del_id" value="{{ $route->id }}"/>
                                                        </form>
                                                        <p>
                                                            <strong style="font-size: 1.3em; color: #fff;">Are you sure you want to DELETE this Route ? </strong>
                                                        </p>
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <a class="btn btn-danger btn-block btn-ok" href=""    onclick="event.preventDefault();
                                                                document.getElementById('delete-form-route-{{ $route->id }}').submit();">Yes</a>
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
