@extends('components.layout')

@section('title', $article->title)
@section('description', $article->summary)

@section('content')
  <!-- Breadcrumb Section -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>{{ $article->title }}</h2>
        <ol>
          <li><a href="{{ url('/') }}">News</a></li>
          <li>{{ Str::limit($article->title, 30) }}</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- Article Detail Section -->
  <section class="blog-details section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <article class="article">
            @if($article->reference_link)
            <div class="post-img">
              <a href="{{ $article->reference_link }}" target="_blank" title="คลิกเพื่อไปยังแหล่งข่าวต้นฉบับ">
                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-fluid">
              </a>
            </div>

            <h2 class="title">
              <a href="{{ $article->reference_link }}" target="_blank" title="คลิกเพื่อไปยังแหล่งข่าวต้นฉบับ">{{ $article->title }}</a>
            </h2>
            @else
            <div class="post-img">
              <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-fluid">
            </div>

            <h2 class="title">{{ $article->title }}</h2>
            @endif

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> {{ $article->author }}</li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="{{ $article->created_at->format('Y-m-d') }}">{{ $article->created_at->format('M d, Y') }}</time></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> {{ $article->genre }}</li>
              </ul>
            </div>

            <div class="content">
              <p class="lead">{{ $article->summary }}</p>
              <div class="article-content">
                {!! nl2br(e($article->content)) !!}
              </div>
            </div>

            <!-- Movie Information Card -->
            <div class="movie-info-card mt-5 p-4 bg-light rounded">
              <h4>Movie Information</h4>
              <div class="row">
                <div class="col-md-6">
                  <p><strong>Title:</strong> {{ $article->movie_title }}</p>
                  <p><strong>Genre:</strong> {{ $article->genre }}</p>
                  <p><strong>Director:</strong> {{ $article->director }}</p>
                </div>
                <div class="col-md-6">
                  <p><strong>Release Date:</strong> {{ $article->release_date->format('F j, Y') }}</p>
                </div>
              </div>
            </div>

            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="{{ route('news.index') }}">{{ $article->genre }}</a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                <li><a href="{{ route('news.index') }}">Movie News</a></li>
                <li><a href="{{ route('news.index') }}">{{ $article->genre }}</a></li>
              </ul>
            </div>


          </article>
        </div>

        <div class="col-lg-4 sidebar">
          <div class="widgets-container">

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">
              <h3 class="widget-title">Recent News</h3>
              @foreach(\App\Models\MovieNews::where('id', '!=', $article->id)->orderBy('created_at', 'desc')->limit(5)->get() as $recentNews)
              <div class="post-item">
                <img src="{{ $recentNews->image_url }}" alt="{{ $recentNews->title }}" class="flex-shrink-0">
                <div>
                  <h4><a href="{{ route('news.show', $recentNews->id) }}">{{ Str::limit($recentNews->title, 60) }}</a></h4>
                  <time datetime="{{ $recentNews->created_at->format('Y-m-d') }}">{{ $recentNews->created_at->format('M d, Y') }}</time>
                </div>
              </div>
              @endforeach
            </div>

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">
              <h3 class="widget-title">Tags</h3>
              <ul>
                <li><a href="{{ route('news.search', ['genre' => 'Action']) }}">Action</a></li>
                <li><a href="{{ route('news.search', ['genre' => 'Drama']) }}">Drama</a></li>
                <li><a href="{{ route('news.search', ['genre' => 'Comedy']) }}">Comedy</a></li>
                <li><a href="{{ route('news.search', ['genre' => 'Sci-Fi']) }}">Science Fiction</a></li>
                <li><a href="{{ route('news.search', ['genre' => 'Horror']) }}">Horror</a></li>
                <li><a href="{{ route('news.search', ['genre' => 'Animation']) }}">Animation</a></li>
                <li><a href="{{ route('news.search', ['genre' => 'Adventure']) }}">Adventure</a></li>
              </ul>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Back to News Section -->
  <section class="back-to-news section-sm bg-light">
    <div class="container">
      <div class="text-center">
        <a href="{{ route('news.index') }}" class="btn btn-primary">
          <i class="bi bi-arrow-left"></i> Back to All News
        </a>
      </div>
    </div>
      </section>
@endsection

@push('styles')
<style>
    .breadcrumbs {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0 20px;
        margin-top: 76px;
    }
    
    .breadcrumbs h2 {
        color: white;
        margin: 0;
        font-size: 1.8rem;
    }
    
    .breadcrumbs ol {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    
    .breadcrumbs ol li {
        display: inline;
        font-size: 14px;
    }
    
    .breadcrumbs ol li a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }
    
    .breadcrumbs ol li a:hover {
        color: white;
    }
    
    .blog-details {
        padding: 60px 0;
    }
    
    .article .title {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 30px 0 20px;
        color: #333;
    }
    
    .meta-top ul {
        list-style: none;
        padding: 0;
        margin: 0 0 30px 0;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .meta-top ul li {
        display: flex;
        align-items: center;
        color: #666;
        font-size: 14px;
    }
    
    .meta-top ul li i {
        margin-right: 8px;
        color: #667eea;
    }
    
    .content {
        margin-bottom: 40px;
    }
    
    .content .lead {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 30px;
    }
    
    .article-content {
        line-height: 1.8;
        color: #444;
    }
    
    .movie-info-card {
        border-left: 4px solid #667eea;
    }
    
    .meta-bottom {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid #eee;
    }
    
    .meta-bottom i {
        color: #667eea;
        margin-right: 10px;
    }
    
    .meta-bottom ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: inline;
    }
    
    .meta-bottom ul li {
        display: inline;
        margin-right: 15px;
    }
    
    .meta-bottom ul li a {
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
    }
    
    .meta-bottom ul li a:hover {
        text-decoration: underline;
    }
    
    .sidebar .widget-item {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }
    
    .widget-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
        border-bottom: 2px solid #667eea;
        padding-bottom: 10px;
    }
    
    .post-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    
    .post-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .post-item img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 15px;
    }
    
    .post-item h4 {
        font-size: 0.95rem;
        margin: 0 0 5px 0;
    }
    
    .post-item h4 a {
        color: #333;
        text-decoration: none;
        font-weight: 500;
    }
    
    .post-item h4 a:hover {
        color: #667eea;
    }
    
    .post-item time {
        font-size: 12px;
        color: #666;
    }
    
    .tags-widget ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .tags-widget ul li {
        display: inline-block;
        margin: 0 5px 8px 0;
    }
    
    .tags-widget ul li a {
        display: inline-block;
        padding: 5px 12px;
        background: #f8f9fa;
        color: #666;
        text-decoration: none;
        border-radius: 20px;
        font-size: 12px;
        transition: all 0.3s ease;
    }
    
    .tags-widget ul li a:hover {
        background: #667eea;
        color: white;
    }
    
    .back-to-news {
        padding: 40px 0;
    }
    
    .back-to-news .btn {
        padding: 12px 30px;
        font-weight: 600;
    }
    
    .reference-link-section {
        border-left: 4px solid #28a745;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .reference-link-section h5 {
        color: #28a745;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .reference-link-section h5 i {
        margin-right: 8px;
    }
    
    .reference-link-section .btn {
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .reference-link-section .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }
    
    .post-img a {
        display: block;
        transition: all 0.3s ease;
    }
    
    .post-img a:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .title a {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .title a:hover {
        color: #667eea;
        text-decoration: none;
    }
    
    @media (max-width: 768px) {
        .breadcrumbs h2 {
            font-size: 1.5rem;
        }
        
        .article .title {
            font-size: 2rem;
        }
        
        .meta-top ul {
            flex-direction: column;
            gap: 10px;
        }
        
        .sidebar {
            margin-top: 40px;
        }
    }
</style>
@endpush