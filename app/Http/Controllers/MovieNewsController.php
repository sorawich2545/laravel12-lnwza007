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

    /**
     * Show the form for creating a new movie news article.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created movie news article in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'movie_title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'release_date' => 'required|date',
            'director' => 'required|string|max:255',
            'image_url' => 'required|url',
            'author' => 'required|string|max:255',
            'reference_link' => 'nullable|url',
        ]);

        MovieNews::create($request->all());

        return redirect()->route('news.index')
            ->with('success', 'ข่าวถูกเพิ่มเรียบร้อยแล้ว');
    }

    /**
     * Show the form for editing the specified movie news article.
     */
    public function edit($id)
    {
        $article = MovieNews::findOrFail($id);
        return view('news.edit', compact('article'));
    }

    /**
     * Update the specified movie news article in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'movie_title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'release_date' => 'required|date',
            'director' => 'required|string|max:255',
            'image_url' => 'required|url',
            'author' => 'required|string|max:255',
            'reference_link' => 'nullable|url',
        ]);

        $article = MovieNews::findOrFail($id);
        $article->update($request->all());

        return redirect()->route('news.index')
            ->with('success', 'ข่าวถูกอัปเดตเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified movie news article from storage.
     */
    public function destroy($id)
    {
        $article = MovieNews::findOrFail($id);
        $article->delete();

        return redirect()->route('news.index')
            ->with('success', 'ข่าวถูกลบเรียบร้อยแล้ว');
    }
}
