@extends('components.layout')

@section('title', $article->title)
@section('description', $article->summary)

@section('content')
    <!-- Breadcrumb Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-decoration-none">
                            <i class="bi bi-house me-1"></i>Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('news.index') }}" class="text-decoration-none">News</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ Str::limit($article->title, 30) }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Article Detail Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <article class="article-content">
                        <!-- Article Header -->
                        <header class="article-header mb-4">
                            <div class="mb-3">
                                <span class="badge bg-primary fs-6">{{ $article->genre }}</span>
                                <span class="badge bg-secondary ms-2">{{ $article->movie_title }}</span>
                            </div>
                            
                            @if($article->reference_link)
                            <h1 class="display-5 fw-bold mb-3">
                                <a href="{{ $article->reference_link }}" target="_blank" title="คลิกเพื่อไปยังแหล่งข่าวต้นฉบับ" class="text-decoration-none text-dark">
                                    {{ $article->title }}
                                </a>
                            </h1>
                            @else
                            <h1 class="display-5 fw-bold mb-3">{{ $article->title }}</h1>
                            @endif
                            
                            <div class="article-meta d-flex flex-wrap align-items-center gap-3 mb-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle me-2 text-primary"></i>
                                    <span class="fw-medium">{{ $article->author }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar-event me-2 text-primary"></i>
                                    <time datetime="{{ $article->created_at->format('Y-m-d') }}">
                                        {{ $article->created_at->format('F j, Y') }}
                                    </time>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-clock me-2 text-primary"></i>
                                    <span>{{ $article->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </header>

                        <!-- Featured Image -->
                        <div class="article-image mb-4">
                            @if($article->reference_link)
                            <a href="{{ $article->reference_link }}" target="_blank" title="คลิกเพื่อไปยังแหล่งข่าวต้นฉบับ">
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-fluid rounded-3 shadow">
                            </a>
                            @else
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-fluid rounded-3 shadow">
                            @endif
                        </div>

                        <!-- Article Summary -->
                        <div class="article-summary mb-4">
                            <div class="alert alert-info border-0 bg-light">
                                <h5 class="alert-heading mb-2">
                                    <i class="bi bi-info-circle me-2"></i>Summary
                                </h5>
                                <p class="lead mb-0">{{ $article->summary }}</p>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="article-body mb-5">
                            <div class="content-text">
                                {!! nl2br(e($article->content)) !!}
                            </div>
                        </div>

                        <!-- Movie Information Card -->
                        <div class="movie-info-card mb-5">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="mb-0">
                                        <i class="bi bi-film me-2"></i>Movie Information
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="info-item mb-3">
                                                <strong class="text-primary">Title:</strong>
                                                <span class="ms-2">{{ $article->movie_title }}</span>
                                            </div>
                                            <div class="info-item mb-3">
                                                <strong class="text-primary">Genre:</strong>
                                                <span class="ms-2">{{ $article->genre }}</span>
                                            </div>
                                            <div class="info-item mb-3">
                                                <strong class="text-primary">Director:</strong>
                                                <span class="ms-2">{{ $article->director }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-item mb-3">
                                                <strong class="text-primary">Release Date:</strong>
                                                <span class="ms-2">{{ $article->release_date->format('F j, Y') }}</span>
                                            </div>
                                            <div class="info-item mb-3">
                                                <strong class="text-primary">Author:</strong>
                                                <span class="ms-2">{{ $article->author }}</span>
                                            </div>
                                            <div class="info-item mb-3">
                                                <strong class="text-primary">Published:</strong>
                                                <span class="ms-2">{{ $article->created_at->format('F j, Y \a\t g:i A') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Article Tags -->
                        <div class="article-tags mb-5">
                            <h5 class="mb-3">
                                <i class="bi bi-tags me-2"></i>Tags
                            </h5>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('news.search', ['genre' => $article->genre]) }}" class="badge bg-primary text-decoration-none">
                                    {{ $article->genre }}
                                </a>
                                <a href="{{ route('news.search', ['q' => $article->movie_title]) }}" class="badge bg-secondary text-decoration-none">
                                    {{ $article->movie_title }}
                                </a>
                                <a href="{{ route('news.search', ['q' => $article->director]) }}" class="badge bg-info text-decoration-none">
                                    {{ $article->director }}
                                </a>
                                <span class="badge bg-dark">Movie News</span>
                            </div>
                        </div>


                        <!-- Share Buttons -->
                        <div class="share-buttons mb-5">
                            <h5 class="mb-3">
                                <i class="bi bi-share me-2"></i>Share This Article
                            </h5>
                            <div class="d-flex gap-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                                   target="_blank" class="btn btn-outline-primary">
                                    <i class="bi bi-facebook me-2"></i>Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}" 
                                   target="_blank" class="btn btn-outline-info">
                                    <i class="bi bi-twitter me-2"></i>Twitter
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" 
                                   target="_blank" class="btn btn-outline-secondary">
                                    <i class="bi bi-linkedin me-2"></i>LinkedIn
                                </a>
                                <button class="btn btn-outline-success" onclick="navigator.share({title: '{{ $article->title }}', url: '{{ request()->url() }}'})">
                                    <i class="bi bi-share me-2"></i>Share
                                </button>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Back to News -->
                        <div class="widget mb-4">
                            <a href="{{ route('news.index') }}" class="btn btn-primary w-100">
                                <i class="bi bi-arrow-left me-2"></i>Back to All News
                            </a>
                        </div>

                        <!-- Recent News Widget -->
                        <div class="widget mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">
                                        <i class="bi bi-clock-history me-2"></i>Recent News
                                    </h5>
                                </div>
                                <div class="card-body p-0">
                                    @foreach($recentNews as $recent)
                                    <div class="recent-news-item p-3 border-bottom">
                                        <div class="d-flex gap-3">
                                            <img src="{{ $recent->image_url }}" alt="{{ $recent->title }}" 
                                                 class="flex-shrink-0" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">
                                                    <a href="{{ route('news.show', $recent->id) }}" class="text-decoration-none text-dark">
                                                        {{ Str::limit($recent->title, 50) }}
                                                    </a>
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar me-1"></i>{{ $recent->created_at->format('M d, Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="widget mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">
                                        <i class="bi bi-collection me-2"></i>Categories
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @php
                                        $categories = ['Action', 'Drama', 'Comedy', 'Sci-Fi', 'Horror', 'Romance', 'Thriller', 'Animation'];
                                    @endphp
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($categories as $category)
                                        <a href="{{ route('news.search', ['genre' => $category]) }}" 
                                           class="badge bg-outline-primary text-decoration-none {{ $category == $article->genre ? 'bg-primary' : 'bg-light text-dark' }}">
                                            {{ $category }}
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Newsletter Widget -->
                        <div class="widget">
                            <div class="card border-0 shadow-sm bg-primary text-white">
                                <div class="card-body text-center">
                                    <h5 class="mb-3">
                                        <i class="bi bi-envelope me-2"></i>Stay Updated
                                    </h5>
                                    <p class="mb-3">Get the latest movie news delivered to your inbox</p>
                                    <form class="d-flex gap-2">
                                        <input type="email" class="form-control" placeholder="Your email">
                                        <button type="submit" class="btn btn-light">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .article-header h1 {
        color: var(--primary-color);
        line-height: 1.2;
    }
    
    .article-meta {
        color: #6c757d;
        font-size: 0.95rem;
    }
    
    .article-image img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
    }
    
    .content-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #2c3e50;
    }
    
    .info-item {
        padding: 8px 0;
        border-bottom: 1px solid #e9ecef;
    }
    
    .info-item:last-child {
        border-bottom: none;
    }
    
    .recent-news-item:hover {
        background-color: #f8f9fa;
    }
    
    .recent-news-item:last-child {
        border-bottom: none !important;
    }
    
    .badge.bg-outline-primary {
        border: 1px solid var(--primary-color);
        color: var(--primary-color);
        background: transparent;
    }
    
    .badge.bg-outline-primary:hover {
        background: var(--primary-color);
        color: white;
    }
    
    .share-buttons .btn {
        transition: all 0.3s ease;
    }
    
    .share-buttons .btn:hover {
        transform: translateY(-2px);
    }
    
    .reference-link-section .card {
        border-left: 4px solid #28a745;
    }
    
    .reference-link-section .btn-success {
        transition: all 0.3s ease;
    }
    
    .reference-link-section .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }
    
    .article-image a {
        display: block;
        transition: all 0.3s ease;
    }
    
    .article-image a:hover {
        transform: scale(1.02);
    }
    
    .article-image a:hover img {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .display-5 a {
        transition: all 0.3s ease;
    }
    
    .display-5 a:hover {
        color: var(--primary-color) !important;
    }
    
    .sidebar .widget {
        position: sticky;
        top: 100px;
    }
    
    @media (max-width: 991.98px) {
        .sidebar .widget {
            position: static;
        }
    }
</style>
@endpush
