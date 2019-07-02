<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Continent;
use App\City;
use App\Airline;
use App\Class_category;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $continents = Continent::orderBy('name', 'asc')->get();
        $cities = City::select('id', 'name')->orderBy('name', 'asc')->get();
        $classes = Class_category::select('id', 'name')->orderBy('name', 'asc')->get();
        $airlines = Airline::select('id', 'name')->orderBy('name', 'asc')->get();

        return view('inquiryForm', compact('cities', 'classes', 'airlines', 'continents'));
    }

    public function create(Booking $booking_obj)
    {
        $this->validate(request(), [
            'departure_date' => 'required|date|after:yesterday',
            'return_date' => 'required|date|after:departure_date',
            'departure_airport' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'destination_airport' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'fare_type' => 'required',
            'ticket_class' => 'required',
            'flight_route' => 'required',
            'customer_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'email_address' => 'required|email',
            'contact_number' => 'required|numeric',
            'adult' => 'required',
            'teenagers' => 'required',
            'child' => 'required',
            'infant' => 'required',
            'comments_or_questions' => 'nullable|regex:/(^[A-Za-z0-9- ]+$)+/',
        ]);
        return $booking_obj->book_flight();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Booking $booking)
    {
        //
    }

    public function edit(Booking $booking)
    {
        //
    }

    public function update(Request $request, Booking $booking)
    {
        //
    }

    public function destroy(Booking $booking)
    {
        //
    }
}
