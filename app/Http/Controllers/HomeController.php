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

    /**
     * Search movie news from home page.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $genre = $request->get('genre');
        
        $news = MovieNews::query();
        
        if ($query) {
            $news->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('summary', 'like', "%{$query}%")
                  ->orWhere('movie_title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            });
        }
        
        if ($genre) {
            $news->where('genre', $genre);
        }
        
        $news = $news->orderBy('created_at', 'desc')->paginate(9);
        
        return view('news', compact('news', 'query', 'genre'));
    }
}
