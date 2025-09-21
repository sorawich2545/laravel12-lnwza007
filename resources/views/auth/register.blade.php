@extends('components.layout')

@section('title', 'สมัครสมาชิก')
@section('description', 'สมัครสมาชิก Movie News Hub')

@section('content')
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('assets/img/img_h_1.jpg') }}" alt="Register Hero" data-aos="fade-in">
    <div class="container">
      <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="col-xl-6 col-lg-8">
          <h2>สมัครสมาชิก<span>.</span></h2>
          <p>เข้าร่วมกับเราเพื่อเข้าถึงข่าวภาพยนตร์ล่าสุด</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Register Form Section -->
  <section id="register" class="register section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card shadow-lg border-0">
            <div class="card-body p-5">
              <div class="text-center mb-4">
                <h3 class="fw-bold text-primary">สมัครสมาชิก</h3>
                <p class="text-muted">สร้างบัญชีใหม่เพื่อเข้าถึงฟีเจอร์พิเศษ</p>
              </div>

              <!-- Success Message -->
              @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              @endif

              <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                  <label for="name" class="form-label">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-person"></i>
                    </span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name') }}" 
                           placeholder="กรอกชื่อ-นามสกุลของคุณ" required autofocus>
                  </div>
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">อีเมล <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" 
                           placeholder="กรอกอีเมลของคุณ" required>
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
                           id="password" name="password" placeholder="กรอกรหัสผ่าน (อย่างน้อย 8 ตัวอักษร)" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                      <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                  </div>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่าน <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-lock-fill"></i>
                    </span>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                           id="password_confirmation" name="password_confirmation" 
                           placeholder="กรอกรหัสผ่านอีกครั้ง" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirmation">
                      <i class="bi bi-eye" id="toggleIconConfirmation"></i>
                    </button>
                  </div>
                  @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-4">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" 
                           id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">
                      ฉันยอมรับ <a href="#" class="text-primary">ข้อกำหนดและเงื่อนไข</a> 
                      และ <a href="#" class="text-primary">นโยบายความเป็นส่วนตัว</a>
                    </label>
                    @error('terms')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="d-grid mb-3">
                  <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-person-plus me-2"></i>สมัครสมาชิก
                  </button>
                </div>

                <div class="text-center">
                  <p class="mb-0">มีบัญชีอยู่แล้ว? 
                    <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">
                      เข้าสู่ระบบที่นี่
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

  // Toggle password confirmation visibility
  document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
    const password = document.getElementById('password_confirmation');
    const icon = document.getElementById('toggleIconConfirmation');
    
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

  // Password strength indicator
  document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strength = getPasswordStrength(password);
    
    // You can add visual feedback here if needed
    console.log('Password strength:', strength);
  });

  function getPasswordStrength(password) {
    let strength = 0;
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    return strength;
  }
</script>
@endpush

@push('styles')
<style>
  .register-section {
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
