<?php

namespace App\Http\Controllers;

use App\Continent;
use App\City;
use App\Route;
use App\User;
use App\Airline;
use App\Class_category;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index($continent_name, $city_name)
    {
        $continents = Continent::orderBy('name', 'asc')->get();

        $city_name = str_replace('_', ' ', $city_name);
        $continent_name = str_replace('_', ' ', $continent_name);

        $routes = Route::join('cities', 'cities.id', '=', 'routes.city')
                        ->join('continents', 'cities.continent_id', '=', 'continents.id')
                        ->join('airports', 'airports.id', '=', 'routes.from_airport')
                        ->join('airlines', 'airlines.id', '=', 'routes.airline_image')
                        ->join('class_categories', 'class_categories.id', '=', 'routes.class_id')
                        ->select('continents.name as continent_name', 'cities.id as city_id', 'cities.name as city', 'airports.name as fromm', 'airlines.image as airline_image', 'airlines.name as airline_name', 'class_categories.name as class', 'routes.price')
                        ->where('cities.name', '=', $city_name)
                        ->where('continents.name', '=', $continent_name)
                        ->get();

        $cities = City::select('id', 'name')->orderBy('name', 'asc')->get();
        $cities_seo_data = City::join('continents', 'cities.continent_id', '=', 'continents.id')
                              ->select('cities.name', 'cities.page_title', 'cities.header_keywords', 'cities.body_keywords', 'cities.body_content', 'cities.meta_title', 'cities.meta_description', 'cities.meta_keywords')
                              ->where('cities.name', '=', $city_name)
                              ->get();

        $classes = Class_category::select('id', 'name')->orderBy('name', 'asc')->get();
        $airlines = Airline::select('id', 'name')->orderBy('name', 'asc')->get();

        $city_images = City::join('continents', 'cities.continent_id', '=', 'continents.id')
                            ->select('cities.image')
                            ->where('cities.name', '=', $city_name)
                            ->where('continents.name', '=', $continent_name)
                            ->get();

        $city_image = NULL;
        foreach ($city_images as $city) {
          $city_image = $city->image;
        }

        $flag = User::select('flag')->where('id', '=', 1)->get();
        foreach ($flag as $value) {
            $flag = $value->flag;
        }

        $seo = null;

        foreach ($cities_seo_data as $seo) {
          $seo = array('page_title' => $seo->page_title, 'header_keywords' => $seo->header_keywords, 'body_keywords' => $seo->body_keywords, 'body_content' => $seo->body_content, 'meta_title' => $seo->meta_title, 'meta_description' => $seo->meta_description, 'meta_keywords' => $seo->meta_keywords);
        }

        if ($city_image)
            return view('routes', compact('continent_name', 'city_name', 'continent_image', 'cities', 'classes', 'airlines', 'continents', 'routes', 'flag', 'city_image', 'seo'));
        else
            return response()->view('errors.404', [], 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Route $route)
    {
        //
    }

    public function edit(Route $route)
    {
        //
    }

    public function update(Request $request, Route $route)
    {
        //
    }

    public function destroy(Route $route)
    {
        //
    }
}
