@extends('layouts.admin')

@section("tab-content")
<div id="customerComlaints" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject sbold uppercase"><h2 style="color:#28B6E9;"><i class="icon-settings"></i><strong>Customer Complaints</strong></h2></span>
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
                                <th> Email </th>
                                <th> Contact Number </th>
                                <th> Complaint </th>
                                <th> Date / Time </th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($complaints as $complaint)
                              <tr>
                                  <td> {{ $complaint->id }} </td>
                                  <td> {{ $complaint->name }} </td>
                                  <td> {{ $complaint->email }} </td>
                                  <td> {{ $complaint->contact_number }} </td>
                                  <td> {{ $complaint->complain }} </td>
                                  <td> {{ $complaint->created_at->format('Y-m-d / H:i:s') }} </td>
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
