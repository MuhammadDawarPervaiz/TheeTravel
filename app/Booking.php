<?php

namespace App;

use App\Model;

class Booking extends Model
{
    public function book_flight()
    {
        try
        {
            Booking::create(['departure_date' => request('departure_date'),
            'return_date' => request('return_date'),
            'departure_airport' => request('departure_airport'),
            'destination_airport' => request('destination_airport'),
            'fare_type' => request('fare_type'),
            'ticket_class' => request('ticket_class'),
            'preffered_airline' => request('preffered_airline'),
            'flight_route' => request('flight_route'),
            'customer_name' => request('customer_name'),
            'email_address' => request('email_address'),
            'contact_number' => request('contact_number'),
            'adult' => request('adult'),
            'teenagers' => request('teenagers'),
            'child' => request('child'),
            'infant' => request('infant'),
            'comments_or_questions' => request('comments_or_questions'),
            'promo_code' => request('promo_code')]);

            session()->flash('message', "Your booking has been placed successfully.");
            return redirect('register');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            session()->flash('exception', "Sorry! " . "Cannot book your flight at this time, please try again later!");
            return back();
        }
    }
}
