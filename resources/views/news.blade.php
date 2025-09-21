@extends('components.layout')

@section('title', 'Movie News')
@section('description', 'Stay updated with the latest movie news, reviews, and industry insights')

@section('content')
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('assets/img/img_h_1.jpg') }}" alt="Movie News Hero" data-aos="fade-in">
    <div class="container">
      <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="col-xl-6 col-lg-8">
          <h2>Movie News<span>.</span></h2>
          <p>Stay updated with the latest movie news, reviews, and industry insights</p>
        </div>
      </div>
    </div>
  </section>

  <!-- News Section -->
  <section id="news" class="news section">
    <div class="container">
      <!-- Add News Button (Admin Only) -->
      @auth
        @if(Auth::user()->isAdmin())
          <div class="row mb-4">
            <div class="col-12 text-center">
              <a href="{{ route('news.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle"></i> เพิ่มข่าวใหม่
              </a>
            </div>
          </div>
        @endif
      @endauth
      
      <!-- Success Message -->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif
      
      <!-- Search Results Info -->
      @if(isset($query) || isset($genre))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <h5 class="alert-heading">
            <i class="bi bi-search me-2"></i>ผลการค้นหา
          </h5>
          @if($query)
            <p class="mb-1"><strong>คำค้นหา:</strong> "{{ $query }}"</p>
          @endif
          @if($genre)
            <p class="mb-1"><strong>ประเภท:</strong> {{ $genre }}</p>
          @endif
          <p class="mb-0">พบ {{ $news->total() }} ข่าว</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif
      
      <div class="row gy-4">
        @foreach($news as $article)
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
          <article class="news-item">
            <div class="post-img">
              <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-fluid">
            </div>
            <p class="post-category">{{ $article->genre }}</p>
            <h2 class="title">
              <a href="{{ route('news.show', $article->id) }}">{{ $article->title }}</a>
            </h2>
            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-author">{{ $article->author }}</p>
                <p class="post-date">
                  <time datetime="{{ $article->created_at->format('Y-m-d') }}">{{ $article->created_at->format('M d, Y') }}</time>
                </p>
              </div>
            </div>
            <p class="post-summary">{{ $article->summary }}</p>
            <div class="movie-info mt-3">
              <small class="text-muted">
                <strong>Movie:</strong> {{ $article->movie_title }} | 
                <strong>Director:</strong> {{ $article->director }} |
                <strong>Release:</strong> {{ $article->release_date->format('M Y') }}
              </small>
            </div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
              <a href="{{ route('news.show', $article->id) }}" class="readmore">Read More <i class="bi bi-arrow-right"></i></a>
              <div class="d-flex gap-2">
                @if($article->reference_link)
                  <a href="{{ $article->reference_link }}" target="_blank" class="btn btn-outline-primary btn-sm" title="อ่านจากแหล่งข่าวต้นฉบับ">
                    <i class="bi bi-box-arrow-up-right"></i> แหล่งข่าว
                  </a>
                @endif
                @auth
                  @if(Auth::user()->isAdmin())
                    <a href="{{ route('news.edit', $article->id) }}" class="btn btn-outline-warning btn-sm" title="แก้ไขข่าว">
                      <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('news.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะลบข่าวนี้?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-sm" title="ลบข่าว">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  @endif
                @endauth
              </div>
            </div>
          </article>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection

@push('styles')
<style>
    .news-item .btn-outline-primary {
        font-size: 0.8rem;
        padding: 4px 8px;
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    
    .news-item .btn-outline-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
    }
    
    .news-item .btn-outline-warning {
        font-size: 0.8rem;
        padding: 4px 8px;
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    
    .news-item .btn-outline-warning:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(255, 193, 7, 0.3);
    }
    
    .news-item .btn-outline-danger {
        font-size: 0.8rem;
        padding: 4px 8px;
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    
    .news-item .btn-outline-danger:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
    }
    
    .news-item .readmore {
        font-size: 0.9rem;
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .news-item .readmore:hover {
        color: #5a6fd8;
        text-decoration: none;
    }
    
    .news-item .readmore i {
        transition: transform 0.3s ease;
    }
    
    .news-item .readmore:hover i {
        transform: translateX(3px);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 25px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }
    
    .alert {
        border-radius: 10px;
        border: none;
    }
    
    .gap-2 {
        gap: 0.5rem;
    }
</style>
@endpush