<?php

namespace App\Http\Controllers;

use response;
use App\Admin;
use App\Continent;
use App\City;
use App\Airport;
use App\Airline;
use App\Route;
use App\Booking;
use App\Class_category;
use App\News;
use App\Customer_complaint;
use App\Customer;
use App\Customer_documents;
use App\Blog;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Index
        public function index()
        {
            $continents = Continent::orderBy('name', 'asc')->get();
            return view('dashboard.dashboard', compact('continents'));
        }

    // Add Flights
        public function addFlights(AdminController $obj_admin)
        {
            $continents = Continent::orderBy('name', 'asc')->get();
            $cities = City::orderBy('name', 'asc')->get();
            $airports = Airport::orderBy('name', 'asc')->get();
            $airlines = Airline::orderBy('name', 'asc')->get();
            $classes = Class_category::orderBy('name', 'asc')->get();

            if(request('update_id'))
            {
                $update_id = request('update_id');
                $update_name = request('update_name');
                $update_data = $obj_admin->get_update_data($update_id, $update_name);
            }
            else
              $update_data = null;

            return view('dashboard.addFlights', compact('continents', 'cities', 'airports', 'airlines', 'classes', 'update_data'));
        }

    // Getting data for updation

        public function get_update_data($update_id, $update_name)
        {
            $continent_data = $city_data = $airport_data = $airline_data = $class_data = $route_data = $blog_data = null;
            switch ($update_name) {
                  case 'blog':
                    $data = Blog::select()->where('id', $update_id)->get();
                    foreach ($data as $value) {
                      $blog_post = $value->blog_post;
                      $blog_link = $value->blog_link;
                      $page_title = $value->page_title;
                      $header_keywords = $value->header_keywords;
                      $body_keywords = $value->body_keywords;
                      $body_content = $value->body_content;
                      $meta_title = $value->meta_title;
                      $meta_description = $value->meta_description;
                      $meta_keywords = $value->meta_keywords;
                    }
                    $blog_data = array('id' => $update_id, 'blog_post' => $blog_post, 'blog_link' => $blog_link, 'page_title' => $page_title, 'header_keywords' => $header_keywords, 'body_keywords' => $body_keywords, 'body_content' => $body_content, 'meta_title' => $meta_title, 'meta_description' => $meta_description, 'meta_keywords' => $meta_keywords);
                    break;
                case 'continent':
                  $data = Continent::select()->where('id', $update_id)->get();
                  foreach ($data as $value) {
                    $name = $value->name;
                    $page_title = $value->page_title;
                    $header_keywords = $value->header_keywords;
                    $body_keywords = $value->body_keywords;
                    $body_content = $value->body_content;
                    $meta_title = $value->meta_title;
                    $meta_description = $value->meta_description;
                    $meta_keywords = $value->meta_keywords;
                  }
                  $continent_data = array('id' => $update_id, 'name' => $name, 'page_title' => $page_title, 'header_keywords' => $header_keywords, 'body_keywords' => $body_keywords, 'body_content' => $body_content, 'meta_title' => $meta_title, 'meta_description' => $meta_description, 'meta_keywords' => $meta_keywords);
                  break;
                case 'city':
                  $data = City::select()->where('id', $update_id)->get();
                  foreach ($data as $value) {
                    $name = $value->name;
                    $page_title = $value->page_title;
                    $header_keywords = $value->header_keywords;
                    $body_keywords = $value->body_keywords;
                    $body_content = $value->body_content;
                    $meta_title = $value->meta_title;
                    $meta_description = $value->meta_description;
                    $meta_keywords = $value->meta_keywords;
                    $continent_id = $value->continent_id;
                  }
                  $city_data = array('id' => $update_id, 'name' => $name, 'page_title' => $page_title, 'header_keywords' => $header_keywords, 'body_keywords' => $body_keywords, 'body_content' => $body_content, 'meta_title' => $meta_title, 'meta_description' => $meta_description, 'meta_keywords' => $meta_keywords, 'continent_id' => $continent_id);
                  break;
                case 'airport':
                  $data = Airport::select()->where('id', $update_id)->get();
                  foreach ($data as $value) {
                    $name = $value->name;
                    $city_id = $value->city_id;
                  }
                  $airport_data = array('id' => $update_id, 'name' => $name, 'city_id' => $city_id);
                  break;
                case 'airline':
                  $data = Airline::select()->where('id', $update_id)->get();
                  foreach ($data as $value) {
                    $name = $value->name;
                  }
                  $airline_data = array('id' => $update_id, 'name' => $name);
                  break;
                case 'class':
                  $data = Class_category::select()->where('id', $update_id)->get();
                  foreach ($data as $value) {
                    $name = $value->name;
                  }
                  $class_data = array('id' => $update_id, 'name' => $name);
                  break;
                case 'route':
                  $data = Route::select()->where('id', $update_id)->get();
                  foreach ($data as $value) {
                    $city = $value->city;
                    $from_airport = $value->from_airport;
                    $airline_id = $value->airline_image;
                    $class_id = $value->class_id;
                    $price = $value->price;
                  }
                  $route_data = array('id' => $update_id, 'city' => $city, 'from_airport' => $from_airport, 'airline_id' => $airline_id, 'class_id' => $class_id, 'price' => $price);
                  break;
                default:
                  return null;
                  break;
            }
            return $update_data = array('blog' => $blog_data, 'continent' => $continent_data, 'city' => $city_data, 'airport' => $airport_data, 'airline' => $airline_data, 'class' => $class_data, 'route' => $route_data);
        }

    // Manage Continents

        // Create
            public function add_continent(Continent $continent_obj)
            {
                $this->validate(request(), [
                    'continent_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                    'continent_image' => 'required|image',
                    'page_title' => 'nullable',
                    'header_keywords' => 'nullable',
                    'body_keywords' => 'nullable',
                    'body_content' => 'nullable',
                    'meta_title' => 'nullable',
                    'meta_description' => 'nullable',
                    'meta_keywords' => 'nullable',
                ]);

                return $continent_obj->set_continent();
            }

        // Read
            public function continents()
            {
                $continents = Continent::orderBy('name', 'asc')->get();
                return view('dashboard.manageFlights.continents', compact('continents'));
            }

        // Update
            public function update_continent($id, Continent $continent_obj)
            {
                $this->validate(request(), [
                    'continent_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                    //'continent_image' => 'required|image',
                    'continent_image' => 'nullable|image',
                    'page_title' => 'nullable',
                    'header_keywords' => 'nullable',
                    'body_keywords' => 'nullable',
                    'body_content' => 'nullable',
                    'meta_title' => 'nullable',
                    'meta_description' => 'nullable',
                    'meta_keywords' => 'nullable',
                ]);

                return $continent_obj->update_continent($id);
            }

        // Delete
            public function del_continent(Continent $continent_obj)
            {
                return $continent_obj->delete_continent();
            }

    // Manage Cities

        // Create
            public function add_city(City $city_obj)
            {
                $this->validate(request(), [
                    'select_continent' => 'required',
                    'city_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                    'city_image' => 'required|image',
                    'page_title' => 'nullable',
                    'header_keywords' => 'nullable',
                    'body_keywords' => 'nullable',
                    'body_content' => 'nullable',
                    'meta_title' => 'nullable',
                    'meta_description' => 'nullable',
                    'meta_keywords' => 'nullable',
                ]);

                return $city_obj->set_city();
            }

        // Read
            public function cities()
            {
                $continents = Continent::orderBy('name', 'asc')->get();
                $cities = City::join('continents', 'cities.continent_id', '=', 'continents.id')
                                ->select('cities.id','cities.name','cities.image','continents.name as continent_name')
                                ->orderBy('cities.name', 'asc')->get();

                return view('dashboard.manageFlights.cities', compact('continents', 'cities'));
            }

        // Update
            public function update_city($id, City $city_obj)
            {
                $this->validate(request(), [
                    'select_continent' => 'required',
                    'city_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                    //'city_image' => 'required|image',
                    'city_image' => 'nullable|image',
                    'page_title' => 'nullable',
                    'header_keywords' => 'nullable',
                    'body_keywords' => 'nullable',
                    'body_content' => 'nullable',
                    'meta_title' => 'nullable',
                    'meta_description' => 'nullable',
                    'meta_keywords' => 'nullable',
                ]);

                return $city_obj->update_city($id);
            }

        // Delete
            public function del_city(City $city_obj)
            {
                return $city_obj->delete_city();
            }

    // Manage Airports

        // Create
            public function add_airport(Airport $airport_obj)
            {
                $this->validate(request(), [
                    'select_city' => 'required',
                    'airport_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                ]);

                return $airport_obj->set_airport();
            }

        // Read
            public function airports()
            {
                $continents = Continent::orderBy('name', 'asc')->get();
                $airports = Airport::join('cities', 'cities.id', '=', 'airports.city_id')
                                    ->select('airports.id','airports.name','cities.name as city_name')
                                    ->orderBy('airports.name', 'asc')->get();

                return view('dashboard.manageFlights.airports', compact('continents', 'airports'));
            }

        // Update
            public function update_airport($id, Airport $airport_obj)
            {
                $this->validate(request(), [
                    'select_city' => 'required',
                    'airport_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                ]);

                return $airport_obj->update_airport($id);
            }

        // Delete
            public function del_airport(Airport $airport_obj)
            {
                return $airport_obj->delete_airport();
            }

    // Manage Airlines

        // Create
            public function add_airline(Airline $airline_obj)
            {
                $this->validate(request(), [
                  'airline_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                  'airline_image' => 'required|image',
                ]);

                return $airline_obj->set_airline();
            }

        // Read
            public function airlines()
            {
                $continents = Continent::orderBy('name', 'asc')->get();
                $airlines = Airline::orderBy('name', 'asc')->get();

                return view('dashboard.manageFlights.airlines', compact('continents', 'airlines'));
            }

        // Update
            public function update_airline($id, Airline $airline_obj)
            {
                $this->validate(request(), [
                  'airline_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                  'airline_image' => 'required|image',
                ]);

                return $airline_obj->update_airline($id);
            }

        // DELETE
            public function del_airline(Airline $airline_obj)
            {
                return $airline_obj->delete_airline();
            }

    // Manage Class

        // Create
            public function add_class(Class_category $class_obj)
            {
                $this->validate(request(), [
                  'class_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                ]);

                return $class_obj->set_class();
            }

        // Read
            public function class()
            {
                $continents = Continent::orderBy('name', 'asc')->get();
                $classes = Class_category::orderBy('name', 'asc')->get();

                return view('dashboard.manageFlights.class', compact('continents', 'classes'));
            }

        // Update
            public function update_class($id, Class_category $class_obj)
            {
                $this->validate(request(), [
                  'class_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
                ]);

                return $class_obj->update_class($id);
            }

        // Delete
            public function del_class(Class_category $class_obj)
            {
                return $class_obj->delete_class();
            }

    // Manage Routes

        // Create
            public function add_route(Route $route_obj)
            {
                $this->validate(request(), [
                  'select_city' => 'required',
                  'from' => 'required',
                  'select_airline' => 'required',
                  'select_class' => 'required',
                  'price' => 'required|numeric',
                ]);

                return $route_obj->set_route();
            }

        // Read
            public function routes()
            {
                $continents = Continent::orderBy('name', 'asc')->get();
                $routes = Route::join('cities', 'cities.id', '=', 'routes.city')
                                ->join('airports', 'airports.id', '=', 'routes.from_airport')
                                ->join('airlines', 'airlines.id', '=', 'routes.airline_image')
                                ->join('class_categories', 'class_categories.id', '=', 'routes.class_id')
                                ->select('routes.id', 'cities.name as city', 'airports.name as from', 'airlines.image as airline_image', 'airlines.name as airline_name', 'class_categories.name as class', 'routes.price')
                                ->orderBy('city', 'asc')->get();

                return view('dashboard.manageFlights.routes', compact('continents', 'routes'));
            }

        // Update
            public function update_route($id, Route $route_obj)
            {
                $this->validate(request(), [
                  'select_city' => 'required',
                  'from' => 'required',
                  'select_airline' => 'required',
                  'select_class' => 'required',
                  'price' => 'required|numeric',
                ]);

                return $route_obj->update_route($id);
            }

        // Delete
            public function del_route(Route $route_obj)
            {
                return $route_obj->delete_route();
            }

    // Manage Bookings

        // Read
            public function bookings()
            {
                $continents = Continent::orderBy('name', 'asc')->get();
                $bookings = Booking::join('class_categories', 'class_categories.id', '=', 'bookings.ticket_class')
                                ->leftJoin('airlines', 'airlines.id', '=', 'bookings.preffered_airline')
                                ->select('bookings.*', 'class_categories.name as ticket_class', 'airlines.name as preffered_airline')
                                ->orderBy('bookings.id', 'asc')->get();

                return view('dashboard.manageBookings', compact('continents', 'bookings'));
            }

        // Confirm Booking
            public function confirm_booking(Request $def)
            {
                if($def->ajax())
                {
                    Booking::where('id', '=', $def->id)->update(array('confirm' => 1));
                    return response($def->all());
                }
            }

      // Manage News

          // Create
              public function add_news(News $news_obj)
              {
                  $this->validate(request(), [
                    'heading' => 'required',
                    'news' => 'required',
                    'image' => 'required|image',
                  ]);

                  return $news_obj->set_news();
              }

          // Read
              public function news()
              {
                  $continents = Continent::orderBy('name', 'asc')->get();
                  return view('dashboard.manageNewsSection', compact('continents'));
              }

      // Manage Blog Posts

          // Create
              public function add_blog_post(Blog $blog_obj)
              {
                  $this->validate(request(), [
                    'blog_image' => 'required',
                    'blog_image.*' => 'image',
                    'blog_post' => 'required',
                    'blog_link' => 'required|url',
                    'page_title' => 'nullable',
                    'header_keywords' => 'nullable',
                    'body_keywords' => 'nullable',
                    'body_content' => 'nullable',
                    'meta_title' => 'nullable',
                    'meta_description' => 'nullable',
                    'meta_keywords' => 'nullable',
                  ]);

                  return $blog_obj->set_blog();
              }

          // Read
              public function blog_post(AdminController $obj_admin)
              {
                  $continents = Continent::orderBy('name', 'asc')->get();

                  if(request('update_id'))
                  {
                      $update_id = request('update_id');
                      $update_name = request('update_name');
                      $update_data = $obj_admin->get_update_data($update_id, $update_name);
                  }
                  else
                    $update_data = null;

                  return view('dashboard.addBlogPost', compact('continents', 'update_data'));
              }

          // Update
              public function update_blog($id, Blog $blog_obj)
              {
                  $this->validate(request(), [
                    'blog_image' => 'nullable',
                    'blog_image.*' => 'image',
                    'blog_post' => 'required',
                    'blog_link' => 'required|url',
                    'page_title' => 'nullable',
                    'header_keywords' => 'nullable',
                    'body_keywords' => 'nullable',
                    'body_content' => 'nullable',
                    'meta_title' => 'nullable',
                    'meta_description' => 'nullable',
                    'meta_keywords' => 'nullable',
                  ]);

                  return $blog_obj->update_blog($id);
              }
              public function manage_blog_post()
              {
                  $continents = Continent::orderBy('name', 'asc')->get();
                  $blogs = Blog::orderBy('id', 'desc')->get();
                  return view('dashboard.manageBlogPost', compact('continents', 'blogs'));
              }

          // Delete
              public function del_blog(Blog $blog_obj)
              {
                  return $blog_obj->delete_blog();
              }

      // View Customer Complaints

          // Read
              public function customer_complaints(Customer_complaint $obj_customer_complaint)
              {
                  return $obj_customer_complaint->index();
              }

      // View Customers

          // Read
              public function view_customers(Customer $obj_customer)
              {
                  $continents = Continent::orderBy('name', 'asc')->get();
                  $customers = Customer::select('customers.*')->get();

                  return view('dashboard.viewCustomers', compact('customers', 'continents'));
              }

              public function customer_documents($id, Customer $obj_customer)
              {
                  $continents = Continent::orderBy('name', 'asc')->get();

                  $documents = Customer::join('customer_documents', 'customers.id' , '=', 'customer_documents.customer_id')
                                                  ->select('customer_documents.*')
                                                  ->where('customers.id', '=', $id)
                                                  ->get();

                  return view('dashboard.viewCustomerDocs', compact('continents', 'documents'));
              }

}
