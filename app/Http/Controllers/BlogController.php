<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Continent;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
      $continents = Continent::all();
      $blogs = Blog::orderBy('id', 'desc')->get();
      return view('blog', compact('continents', 'blogs'));
    }
    public function show()
    {
      $id = request('id');
      $continents = Continent::all();
      $blogs = Blog::select()->where('id', '=', $id)->get();

      $seo = null;
      foreach ($blogs as $seo) {
        $seo = array('page_title' => $seo->page_title, 'header_keywords' => $seo->header_keywords, 'body_keywords' => $seo->body_keywords, 'body_content' => $seo->body_content, 'meta_title' => $seo->meta_title, 'meta_description' => $seo->meta_description, 'meta_keywords' => $seo->meta_keywords);
      }

      return view('blogRead', compact('continents', 'blogs', 'seo'));
    }
}
