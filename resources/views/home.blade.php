@extends('components.layout')

@section('title', 'Home')
@section('description', 'Welcome to Movie News Hub - Your ultimate destination for the latest movie news, reviews, and
    industry insights')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="display-4 fw-bold mb-4">
                        Stay Updated with the Latest
                        <span class="text-warning">Movie News</span>
                    </h1>
                    <p class="lead mb-4 text-light">
                        Your ultimate destination for the latest movie news, reviews, and industry insights
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('news.index') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-newspaper me-2"></i>Browse News
                        </a>
                        <a href="#featured" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-star me-2"></i>Featured
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="team-info text-center">
                        <h6 class="text-light mb-4 fw-bold display-6">Developed by:</h6>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="team-member text-center p-4 rounded"
                                    style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                                    <div class="member-avatar mb-3">
                                        <i class="bi bi-person-circle text-warning" style="font-size: 3rem;"></i>
                                    </div>
                                    <h5 class="text-light mb-2 fw-bold">สรวิชญ์ สุดามาตร</h5>
                                    <small class="text-light-50">67222420009</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="team-member text-center p-4 rounded"
                                    style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                                    <div class="member-avatar mb-3">
                                        <i class="bi bi-person-circle text-warning" style="font-size: 3rem;"></i>
                                    </div>
                                    <h5 class="text-light mb-2 fw-bold">ปริญวัฒน์ เกียรฐิติพล</h5>
                                    <small class="text-light-50">67222420002</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="team-member text-center p-4 rounded"
                                    style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                                    <div class="member-avatar mb-3">
                                        <i class="bi bi-person-circle text-warning" style="font-size: 3rem;"></i>
                                    </div>
                                    <h5 class="text-light mb-2 fw-bold">ฐิติวัฒน์ ช้างจีน</h5>
                                    <small class="text-light-50">67222420005</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured News Section -->
    <section id="featured" class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <span class="section-subtitle">Featured Stories</span>
                    <h2 class="section-title">Latest Movie News & Updates</h2>
                    <p class="text-muted">Stay ahead with our curated selection of the most important movie industry news
                    </p>
                </div>
            </div>
            <div class="mb-3">
                <input type="text" name="title" id="title" class="form-control rounded-pill shadow-sm"
                    placeholder="MovieNews" required>
                <button type="submit" class="btn btn-success mt-3">Search</button>
            </div>
            <div class="row g-4">
                @foreach ($featuredNews as $index => $article)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="card h-100">
                            <div class="position-relative">
                                <img src="{{ $article->image_url }}" class="card-img-top" alt="{{ $article->title }}"
                                    style="height: 200px; object-fit: cover;">
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-primary">{{ $article->genre }}</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar me-1"></i>{{ $article->created_at->format('M d, Y') }}
                                    </small>
                                </div>
                                <h5 class="card-title">{{ Str::limit($article->title, 60) }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($article->summary, 120) }}</p>
                                <div class="mt-auto">
                                    <a href="{{ route('news.show', $article->id) }}" class="btn btn-outline-primary">
                                        Read More <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('news.index') }}" class="btn btn-primary btn-lg">
                    View All News <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <span class="section-subtitle">Breaking News</span>
                    <h2 class="section-title">Fresh from the Industry</h2>
                    <p class="text-muted">The most recent updates and breaking news from Hollywood and beyond</p>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($latestNews as $index => $article)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <img src="{{ $article->image_url }}" class="card-img-top" alt="{{ $article->title }}"
                                    style="height: 200px; object-fit: cover;">
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-warning text-dark">{{ $article->genre }}</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <small class="text-muted">
                                        <i class="bi bi-clock me-1"></i>{{ $article->created_at->diffForHumans() }}
                                    </small>
                                </div>
                                <h5 class="card-title">{{ Str::limit($article->title, 50) }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($article->summary, 100) }}</p>
                                <div class="mt-auto">
                                    <a href="{{ route('news.show', $article->id) }}" class="btn btn-outline-warning">
                                        Read More <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <span class="section-subtitle">Explore</span>
                    <h2 class="section-title">Movie Categories</h2>
                    <p class="text-muted">Browse news by your favorite movie genres</p>
                </div>
            </div>

            <div class="row g-4">
                @php
                    $categories = ['Action', 'Drama', 'Comedy', 'Sci-Fi', 'Horror', 'Romance', 'Thriller', 'Animation'];
                @endphp

                @foreach ($categories as $index => $category)
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                        <a href="{{ route('news.search', ['genre' => $category]) }}" class="text-decoration-none">
                            <div class="card text-center h-100 category-card">
                                <div class="card-body">
                                    <div class="category-icon mb-3">
                                        @switch($category)
                                            @case('Action')
                                                <i class="bi bi-lightning-charge display-4 text-danger"></i>
                                            @break

                                            @case('Drama')
                                                <i class="bi bi-heart display-4 text-primary"></i>
                                            @break

                                            @case('Comedy')
                                                <i class="bi bi-emoji-laughing display-4 text-warning"></i>
                                            @break

                                            @case('Sci-Fi')
                                                <i class="bi bi-rocket display-4 text-info"></i>
                                            @break

                                            @case('Horror')
                                                <i class="bi bi-ghost display-4 text-dark"></i>
                                            @break

                                            @case('Romance')
                                                <i class="bi bi-heart-fill display-4 text-danger"></i>
                                            @break

                                            @case('Thriller')
                                                <i class="bi bi-exclamation-triangle display-4 text-warning"></i>
                                            @break

                                            @case('Animation')
                                                <i class="bi bi-palette display-4 text-success"></i>
                                            @break
                                        @endswitch
                                    </div>
                                    <h5 class="card-title">{{ $category }}</h5>
                                    <p class="card-text small text-muted">Latest {{ $category }} movie news</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h3 class="mb-3">Stay Updated!</h3>
                    <p class="mb-0">Subscribe to our newsletter and never miss the latest movie news, exclusive
                        interviews, and industry insights.</p>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control form-control-lg"
                            placeholder="Enter your email address">
                        <button type="submit" class="btn btn-light btn-lg">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .category-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .category-icon i {
            transition: transform 0.3s ease;
        }

        .category-card:hover .category-icon i {
            transform: scale(1.1);
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .bg-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }

        .team-member {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .team-member:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2) !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .member-avatar i {
            transition: all 0.3s ease;
        }

        .team-member:hover .member-avatar i {
            transform: scale(1.1);
            color: #ffc107 !important;
        }

        .team-info h6 {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>
@endpush
