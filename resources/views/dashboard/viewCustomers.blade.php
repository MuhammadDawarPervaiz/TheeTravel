@extends('layouts.admin')

@section("tab-content")
<div id="viewCustomers" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject sbold uppercase"><h2 style="color:#28B6E9;"><i class="icon-settings"></i><strong>Customers</strong></h2></span>
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
                                <th> Date/Time </th>
                                <th> First_Name </th>
                                <th> Last_Name </th>
                                <th> D.O.B </th>
                                <th> Gender </th>
                                <th> Contact_0Number </th>
                                <th> Email </th>
                                <th> Skype_ID </th>
                                <th> facebook_ID </th>
                                <th> Current_Country </th>
                                <th> Permanent_Residence </th>
                                <th> Documents </th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($customers as $customer)
                              <tr>
                                  <td> {{ $customer->id }} </td>
                                  <td> {{ $customer->created_at->format('Y-m-d / H:i:s') }} </td>
                                  <td> {{ $customer->first_name }} </td>
                                  <td> {{ $customer->last_name }} </td>
                                  <td> {{ $customer->dob }} </td>
                                  <td> {{ $customer->gender }} </td>
                                  <td> {{ $customer->contact_number }} </td>
                                  <td> {{ $customer->email }} </td>
                                  <td> {{ $customer->skype_id }} </td>
                                  <td> {{ $customer->facebook_id }} </td>
                                  <td> {{ $customer->current_country }} </td>
                                  <td> {{ $customer->permanent_residence }} </td>
                                  <td class="text-center">
                                      <a class="fa fa-file-text" href="{{ route('admin.customerDocuments', $customer->id)}}"></a>
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
