<?php

namespace App\Http\Controllers;

use App\Models\MovieNews;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $featuredNews = MovieNews::orderBy('created_at', 'desc')->limit(6)->get();
        $latestNews = MovieNews::orderBy('created_at', 'desc')->limit(3)->get();
        
        return view('home', compact('featuredNews', 'latestNews'));
    }
}
