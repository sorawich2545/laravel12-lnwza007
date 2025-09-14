@props(['article'])

<div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <article>
    <div class="post-img">
      <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-fluid">
    </div>
    <p class="post-category">{{ $article->genre }}</p>
    <h2 class="title">
      <a href="{{ route('news.detail', $article->id) }}">{{ $article->title }}</a>
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
    <div class="mt-3">
      <a href="{{ route('news.detail', $article->id) }}" class="readmore stretched-link">Read More <i class="bi bi-arrow-right"></i></a>
    </div>
  </article>
</div>