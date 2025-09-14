@extends('components.layout')

@section('title', 'Movie News')
@section('description', 'Browse all the latest movie news, reviews, and industry updates')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Movie News</h1>
                    <p class="lead mb-4">Stay updated with the latest movie news, reviews, and industry insights</p>
                    
                    <!-- Search Form -->
                    <form action="{{ route('news.search') }}" method="GET" class="row g-3 justify-content-center">
                        <div class="col-md-6">
                            <div class="input-group input-group-lg">
                                <input type="text" name="q" class="form-control" placeholder="Search news..." value="{{ $query ?? '' }}">
                                <button class="btn btn-light" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select name="genre" class="form-select form-select-lg">
                                <option value="">All Genres</option>
                                @php
                                    $genres = ['Action', 'Drama', 'Comedy', 'Sci-Fi', 'Horror', 'Romance', 'Thriller', 'Animation'];
                                @endphp
                                @foreach($genres as $genre)
                                    <option value="{{ $genre }}" {{ ($genreFilter ?? '') == $genre ? 'selected' : '' }}>
                                        {{ $genre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- News Grid Section -->
    <section class="py-5">
        <div class="container">
            @if(isset($query) || isset($genre))
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        @if(isset($query) && isset($genre))
                            Showing results for "{{ $query }}" in {{ $genre }} genre
                        @elseif(isset($query))
                            Showing results for "{{ $query }}"
                        @elseif(isset($genre))
                            Showing results for {{ $genre }} genre
                        @endif
                        <a href="{{ route('news.index') }}" class="btn btn-sm btn-outline-info ms-3">Clear Filters</a>
                    </div>
                </div>
            </div>
            @endif

            @if($news->count() > 0)
            <div class="row g-4">
                @foreach($news as $article)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <article class="card h-100 news-card">
                        <div class="position-relative">
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-primary">{{ $article->genre }}</span>
                            </div>
                            <div class="position-absolute top-0 end-0 m-3">
                                <small class="text-white bg-dark bg-opacity-75 px-2 py-1 rounded">
                                    {{ $article->created_at->format('M d') }}
                                </small>
                            </div>
                        </div>
                        
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-person me-1"></i>{{ $article->author }}
                                    <span class="mx-2">•</span>
                                    <i class="bi bi-calendar me-1"></i>{{ $article->created_at->format('M d, Y') }}
                                </small>
                            </div>
                            
                            <h5 class="card-title">
                                <a href="{{ route('news.show', $article->id) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($article->title, 60) }}
                                </a>
                            </h5>
                            
                            <p class="card-text text-muted">{{ Str::limit($article->summary, 120) }}</p>
                            
                            <div class="movie-info mt-3 mb-3">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <small class="text-muted d-block">Movie</small>
                                        <strong class="text-primary">{{ Str::limit($article->movie_title, 15) }}</strong>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Director</small>
                                        <strong class="text-primary">{{ Str::limit($article->director, 15) }}</strong>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Release</small>
                                        <strong class="text-primary">{{ $article->release_date->format('M Y') }}</strong>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-auto">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('news.show', $article->id) }}" class="btn btn-primary flex-grow-1">
                                        Read More <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                    @if($article->reference_link)
                                        <a href="{{ $article->reference_link }}" target="_blank" class="btn btn-outline-success" title="อ่านจากแหล่งข่าวต้นฉบับ">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($news->hasPages())
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="News pagination">
                        {{ $news->appends(request()->query())->links() }}
                    </nav>
                </div>
            </div>
            @endif
            
            @else
            <div class="row">
                <div class="col-12 text-center py-5">
                    <div class="empty-state">
                        <i class="bi bi-newspaper display-1 text-muted mb-4"></i>
                        <h3>No news found</h3>
                        <p class="text-muted mb-4">
                            @if(isset($query) || isset($genre))
                                No news articles match your search criteria. Try adjusting your search terms.
                            @else
                                No news articles available at the moment. Check back later for updates.
                            @endif
                        </p>
                        <a href="{{ route('news.index') }}" class="btn btn-primary">Browse All News</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h3 class="mb-3">Never Miss a Story</h3>
                    <p class="text-muted mb-4">Subscribe to our newsletter and get the latest movie news delivered to your inbox every week.</p>
                    <form class="row g-3 justify-content-center">
                        <div class="col-md-8">
                            <input type="email" class="form-control form-control-lg" placeholder="Enter your email address">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .news-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .news-card .card-title a:hover {
        color: var(--secondary-color) !important;
    }
    
    .empty-state {
        padding: 60px 20px;
    }
    
    .empty-state i {
        opacity: 0.3;
    }
    
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .form-control:focus,
    .form-select:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }
    
    .btn-light {
        background: white;
        border: 1px solid #dee2e6;
    }
    
    .btn-light:hover {
        background: #f8f9fa;
        border-color: #adb5bd;
    }
    
    .news-card .btn-outline-success {
        transition: all 0.3s ease;
        min-width: 40px;
    }
    
    .news-card .btn-outline-success:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
    }
</style>
@endpush
