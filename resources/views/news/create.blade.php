@extends('components.layout')

@section('title', 'เพิ่มข่าวใหม่')
@section('description', 'เพิ่มข่าวภาพยนตร์ใหม่')

@section('content')
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('assets/img/img_h_1.jpg') }}" alt="Add News Hero" data-aos="fade-in">
    <div class="container">
      <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="col-xl-6 col-lg-8">
          <h2>เพิ่มข่าวใหม่<span>.</span></h2>
          <p>เพิ่มข่าวภาพยนตร์ใหม่เข้าสู่ระบบ</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Form Section -->
  <section id="form" class="form section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow-lg">
            <div class="card-body p-5">
              <form action="{{ route('news.store') }}" method="POST">
                @csrf
                
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">หัวข้อข่าว <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="col-md-6 mb-3">
                    <label for="movie_title" class="form-label">ชื่อภาพยนตร์ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('movie_title') is-invalid @enderror" 
                           id="movie_title" name="movie_title" value="{{ old('movie_title') }}" required>
                    @error('movie_title')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="genre" class="form-label">ประเภท <span class="text-danger">*</span></label>
                    <select class="form-select @error('genre') is-invalid @enderror" id="genre" name="genre" required>
                      <option value="">เลือกประเภท</option>
                      <option value="Action" {{ old('genre') == 'Action' ? 'selected' : '' }}>Action</option>
                      <option value="Comedy" {{ old('genre') == 'Comedy' ? 'selected' : '' }}>Comedy</option>
                      <option value="Drama" {{ old('genre') == 'Drama' ? 'selected' : '' }}>Drama</option>
                      <option value="Horror" {{ old('genre') == 'Horror' ? 'selected' : '' }}>Horror</option>
                      <option value="Romance" {{ old('genre') == 'Romance' ? 'selected' : '' }}>Romance</option>
                      <option value="Sci-Fi" {{ old('genre') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                      <option value="Thriller" {{ old('genre') == 'Thriller' ? 'selected' : '' }}>Thriller</option>
                      <option value="Animation" {{ old('genre') == 'Animation' ? 'selected' : '' }}>Animation</option>
                      <option value="Documentary" {{ old('genre') == 'Documentary' ? 'selected' : '' }}>Documentary</option>
                    </select>
                    @error('genre')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="col-md-6 mb-3">
                    <label for="release_date" class="form-label">วันที่ออกฉาย <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('release_date') is-invalid @enderror" 
                           id="release_date" name="release_date" value="{{ old('release_date') }}" required>
                    @error('release_date')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="director" class="form-label">ผู้กำกับ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('director') is-invalid @enderror" 
                           id="director" name="director" value="{{ old('director') }}" required>
                    @error('director')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="col-md-6 mb-3">
                    <label for="author" class="form-label">ผู้เขียนข่าว <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" 
                           id="author" name="author" value="{{ old('author') }}" required>
                    @error('author')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="mb-3">
                  <label for="image_url" class="form-label">URL รูปภาพ <span class="text-danger">*</span></label>
                  <input type="url" class="form-control @error('image_url') is-invalid @enderror" 
                         id="image_url" name="image_url" value="{{ old('image_url') }}" 
                         placeholder="https://example.com/image.jpg" required>
                  @error('image_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="reference_link" class="form-label">ลิงก์อ้างอิง</label>
                  <input type="url" class="form-control @error('reference_link') is-invalid @enderror" 
                         id="reference_link" name="reference_link" value="{{ old('reference_link') }}" 
                         placeholder="https://example.com/source">
                  @error('reference_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="summary" class="form-label">สรุปข่าว <span class="text-danger">*</span></label>
                  <textarea class="form-control @error('summary') is-invalid @enderror" 
                            id="summary" name="summary" rows="3" maxlength="500" required>{{ old('summary') }}</textarea>
                  <div class="form-text">อักขระที่ใช้: <span id="summary-count">0</span>/500</div>
                  @error('summary')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label for="content" class="form-label">เนื้อหาข่าว <span class="text-danger">*</span></label>
                  <textarea class="form-control @error('content') is-invalid @enderror" 
                            id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                  @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="d-flex justify-content-between">
                  <a href="{{ route('news.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> กลับ
                  </a>
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> บันทึกข่าว
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
  // Character counter for summary
  document.getElementById('summary').addEventListener('input', function() {
    const count = this.value.length;
    document.getElementById('summary-count').textContent = count;
    
    if (count > 500) {
      this.classList.add('is-invalid');
    } else {
      this.classList.remove('is-invalid');
    }
  });
</script>
@endpush

@push('styles')
<style>
  .form-section {
    padding: 60px 0;
  }
  
  .card {
    border: none;
    border-radius: 15px;
  }
  
  .form-label {
    font-weight: 600;
    color: #333;
  }
  
  .btn {
    border-radius: 8px;
    padding: 10px 20px;
    font-weight: 500;
  }
  
  .form-control:focus,
  .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
  }
</style>
@endpush
