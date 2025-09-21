@extends('components.layout')

@section('title', 'เข้าสู่ระบบ')
@section('description', 'เข้าสู่ระบบ Movie News Hub')

@section('content')
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('assets/img/img_h_1.jpg') }}" alt="Login Hero" data-aos="fade-in">
    <div class="container">
      <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="col-xl-6 col-lg-8">
          <h2>เข้าสู่ระบบ<span>.</span></h2>
          <p>เข้าสู่ระบบเพื่อเข้าถึงฟีเจอร์พิเศษ</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Login Form Section -->
  <section id="login" class="login section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card shadow-lg border-0">
            <div class="card-body p-5">
              <div class="text-center mb-4">
                <h3 class="fw-bold text-primary">เข้าสู่ระบบ</h3>
                <p class="text-muted">ยินดีต้อนรับกลับสู่ Movie News Hub</p>
              </div>

              <!-- Success Message -->
              @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              @endif

              <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                  <label for="email" class="form-label">อีเมล <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" 
                           placeholder="กรอกอีเมลของคุณ" required autofocus>
                  </div>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">รหัสผ่าน <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" placeholder="กรอกรหัสผ่านของคุณ" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                      <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                  </div>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="remember" name="remember">
                  <label class="form-check-label" for="remember">
                    จดจำการเข้าสู่ระบบ
                  </label>
                </div>

                <div class="d-grid mb-3">
                  <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-box-arrow-in-right me-2"></i>เข้าสู่ระบบ
                  </button>
                </div>

                <div class="text-center">
                  <p class="mb-0">ยังไม่มีบัญชี? 
                    <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">
                      สมัครสมาชิกที่นี่
                    </a>
                  </p>
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
  // Toggle password visibility
  document.getElementById('togglePassword').addEventListener('click', function() {
    const password = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');
    
    if (password.type === 'password') {
      password.type = 'text';
      icon.classList.remove('bi-eye');
      icon.classList.add('bi-eye-slash');
    } else {
      password.type = 'password';
      icon.classList.remove('bi-eye-slash');
      icon.classList.add('bi-eye');
    }
  });
</script>
@endpush

@push('styles')
<style>
  .login-section {
    padding: 80px 0;
  }
  
  .card {
    border-radius: 15px;
    border: none;
  }
  
  .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
  }
  
  .btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
  }
  
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
  }
  
  .input-group-text {
    background: #f8f9fa;
    border-color: #dee2e6;
  }
  
  .form-check-input:checked {
    background-color: #667eea;
    border-color: #667eea;
  }
  
  .alert {
    border-radius: 10px;
    border: none;
  }
</style>
@endpush
