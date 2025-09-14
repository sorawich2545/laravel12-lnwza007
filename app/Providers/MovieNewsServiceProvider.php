<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MovieNews;
use Illuminate\Support\Facades\View;

class MovieNewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share common data with all views
        View::composer('*', function ($view) {
            $view->with('popularGenres', $this->getPopularGenres());
            $view->with('latestNews', $this->getLatestNews());
        });
    }

    /**
     * Get popular genres for sidebar
     */
    private function getPopularGenres()
    {
        return MovieNews::select('genre')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('genre')
            ->orderBy('count', 'desc')
            ->limit(8)
            ->pluck('genre')
            ->toArray();
    }

    /**
     * Get latest news for sidebar
     */
    private function getLatestNews()
    {
        return MovieNews::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }
}
