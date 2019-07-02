@extends('layouts.admin')

@section("tab-content")
<div id="manageBookings" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject sbold uppercase"><h2 style="color:#28B6E9;"><i class="icon-settings"></i><strong>Bookings</strong></h2></span>
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
                                <th> departure_date </th>
                                <th> return_date </th>
                                <th> departure_airport </th>
                                <th> destination_airport </th>
                                <th> fare_type </th>
                                <th> ticket_class </th>
                                <th> preffered_airline </th>
                                <th> flight_route </th>
                                <th> customer_name </th>
                                <th> email_address </th>
                                <th> contact_number </th>
                                <th> adult </th>
                                <th> teenagers </th>
                                <th> child </th>
                                <th> infant </th>
                                <th> comments_or_questions </th>
                                <th> promo_code </th>
                                <th> Confirm </th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($bookings as $booking)
                              <tr>
                                  <td> {{ $booking->id }} </td>
                                  <td> {{ $booking->created_at->format('Y-m-d / H:i:s') }} </td>
                                  <td> {{ $booking->departure_date }} </td>
                                  <td> {{ $booking->return_date }} </td>
                                  <td> {{ $booking->departure_airport }} </td>
                                  <td> {{ $booking->destination_airport }} </td>
                                  <td> {{ $booking->fare_type }} </td>
                                  <td> {{ $booking->ticket_class }} </td>
                                  <td> @if(!$booking->preffered_airline) Any AIrline @else {{ $booking->preffered_airline }}  @endif </td>
                                  <td> {{ $booking->flight_route }} </td>
                                  <td> {{ $booking->customer_name }} </td>
                                  <td> {{ $booking->email_address }} </td>
                                  <td> {{ $booking->contact_number }} </td>
                                  <td> {{ $booking->adult }} </td>
                                  <td> {{ $booking->teenagers }} </td>
                                  <td> {{ $booking->child }} </td>
                                  <td> {{ $booking->infant }} </td>
                                  <td> {{ $booking->comments_or_questions }} </td>
                                  <td> {{ $booking->promo_code }} </td>
                                  <td class="text-center">
                                      <input type="radio" name="confirm_booking_{{ $booking->id }}" id="confirm_booking" value="{{ $booking->id }}"
                                          @if($booking->confirm)
                                              checked
                                          @endif
                                      />
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
