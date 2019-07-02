<?php

namespace App\Http\Controllers;

use App\Continent;
use App\City;
use Illuminate\Http\Request;

class ContinentController extends Controller
{
    public function index($continent_name)
    {
        $continents = Continent::orderBy('name', 'asc')->get();
        $continent_name = str_replace('_', ' ', $continent_name);
        $continent_image = Continent::select('image', 'name')->where('name', '=', $continent_name)->get();
        $continent_seo_data = Continent::select('page_title', 'header_keywords', 'body_keywords', 'body_content', 'meta_title', 'meta_description', 'meta_keywords')->where('name', '=', $continent_name)->get();
        $cities = City::join('continents', 'cities.continent_id', '=', 'continents.id')->select('cities.name')->where('continents.name', '=', $continent_name)->orderBy('cities.name', 'asc')->get();
        $seo = null;
        
        foreach ($continent_seo_data as $seo) {
          $seo = array('page_title' => $seo->page_title, 'header_keywords' => $seo->header_keywords, 'body_keywords' => $seo->body_keywords, 'body_content' => $seo->body_content, 'meta_title' => $seo->meta_title, 'meta_description' => $seo->meta_description, 'meta_keywords' => $seo->meta_keywords);
        }

        return view('flights', compact('continent_name', 'continent_image', 'cities', 'continents', 'seo'));
    }
}
