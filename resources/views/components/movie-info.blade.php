@props(['article'])

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