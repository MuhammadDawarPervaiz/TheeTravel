<?php

namespace App\Http\Controllers;

use App\Continent;
use App\City;
use App\Route;
use App\User;
use App\News;
use App\Class_category;
use App\Airport;
use App\Airline;
use App\ContactUsServer;
use App\Booking;
use DB;
use Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $continents = Continent::orderBy('name', 'asc')->get();
        $airlines = Airline::orderBy('name', 'asc')->get();
        $classes = Class_category::orderBy('name', 'asc')->get();

        $routes = Route::join('cities', 'cities.id', '=', 'routes.city')
                        ->join('airports', 'airports.id', '=', 'routes.from_airport')
                        ->join('airlines', 'airlines.id', '=', 'routes.airline_image')
                        ->join('class_categories', 'class_categories.id', '=', 'routes.class_id')
                        ->select('cities.name as city', 'airports.name as from', 'airlines.image as airline_image', 'airlines.name as airline_name', 'class_categories.name as class', 'routes.price')
                        ->limit(4)
                        ->orderBy(DB::raw('RAND()'))
                        ->get();

        $news = News::all();

        $flag = User::select('flag')->where('id', '=', 1)->get();
        foreach ($flag as $value) {
            $flag = $value->flag;
        }

        return view('index', compact('continents', 'routes', 'flag', 'news', 'airlines', 'classes'));
    }

    public function postContact()
    {
        $this->validate(request(), [
            'name' => 'required|min:3|regex:/(^[A-Za-z ]+$)+/',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        $data = array('name' => request('name'), 'email' => request('email'), 'bodyMessage' => request('message'));

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('inquiry@theetravel.com');
            $message->subject('Contact Form');
        });

        session()->flash('message', "Your message has been placed successfully.");

        $continents = Continent::all();
        return view('contactUs', compact('continents'));
    }

    public function search()
    {
        $this->validate(request(), [
            'leaving_from' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'going_to' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'airline' => 'numeric|nullable',
            'class' => 'numeric|nullable',
        ]);

        $continents = Continent::orderBy('name', 'asc')->get();

        if(request('going_to'))
          $city_name = request('going_to');
        else
          $city_name = NULL;
        if(request('airline'))
          $airline_id = request('airline');
        else
          $airline_id = NULL;

        $routes = Route::join('cities', 'cities.id', '=', 'routes.city')
                        ->join('airports', 'airports.id', '=', 'routes.from_airport')
                        ->join('airlines', 'airlines.id', '=', 'routes.airline_image')
                        ->join('class_categories', 'class_categories.id', '=', 'routes.class_id')
                        ->select('cities.id as city_id', 'cities.name as city', 'airports.name as fromm', 'airlines.image as airline_image', 'airlines.name as airline_name', 'class_categories.name as class', 'routes.price')
                        ->where('cities.name', 'like', '%' . $city_name . '%')
                        ->orWhere('routes.airline_image', $airline_id)
                        ->get();
        //dd($routes);
        $cities = City::select('id', 'name')->orderBy('name', 'asc')->get();
        $classes = Class_category::select('id', 'name')->orderBy('name', 'asc')->get();
        $airlines = Airline::select('id', 'name')->orderBy('name', 'asc')->get();

        $city_image = City::select('image')->where('name', '=', $city_name)->get();
        foreach ($city_image as $city) {
          $city_image = $city->image;
        }

        $flag = User::select('flag')->where('id', '=', 1)->get();
        foreach ($flag as $value) {
            $flag = $value->flag;
        }

        return view('routes', compact('continent_name', 'city_name', 'continent_image', 'cities', 'classes', 'airlines', 'continents', 'routes', 'flag', 'city_image'));
    }
}
