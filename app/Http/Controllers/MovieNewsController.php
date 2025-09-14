<?php

namespace App\Http\Controllers;

use App\Models\MovieNews;
use Illuminate\Http\Request;

class MovieNewsController extends Controller
{
    /**
     * Display a listing of the movie news.
     */
    public function index()
    {
        $news = MovieNews::orderBy('created_at', 'desc')->paginate(9);
        return view('news', compact('news'));
    }

    /**
     * Display the specified movie news article.
     */
    public function show($id)
    {
        $article = MovieNews::findOrFail($id);
        $recentNews = MovieNews::where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('news-detail', compact('article', 'recentNews'));
    }

    /**
     * Search movie news by genre or title.
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
                  ->orWhere('movie_title', 'like', "%{$query}%");
            });
        }
        
        if ($genre) {
            $news->where('genre', $genre);
        }
        
        $news = $news->orderBy('created_at', 'desc')->paginate(9);
        
        return view('news', compact('news', 'query', 'genre'));
    }
}
