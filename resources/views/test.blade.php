<!DOCTYPE html>
<html>
<head>
    <title>Test Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Test Page - ตรวจสอบการ Login</h1>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>สถานะการ Login</h5>
                    </div>
                    <div class="card-body">
                        @auth
                            <p class="text-success">✅ คุณได้ Login แล้ว</p>
                            <p><strong>ชื่อ:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
                            <p><strong>Is Admin:</strong> 
                                @if(Auth::user()->isAdmin())
                                    <span class="badge bg-success">YES</span>
                                @else
                                    <span class="badge bg-danger">NO</span>
                                @endif
                            </p>
                        @else
                            <p class="text-danger">❌ คุณยังไม่ได้ Login</p>
                            <a href="/login" class="btn btn-primary">ไป Login</a>
                        @endauth
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>ปุ่มเพิ่มข่าว</h5>
                    </div>
                    <div class="card-body">
                        @auth
                            @if(Auth::user()->isAdmin())
                                <p class="text-success">✅ คุณเป็น Admin - ปุ่มควรแสดง</p>
                                <a href="/news/create" class="btn btn-primary">เพิ่มข่าวใหม่</a>
                            @else
                                <p class="text-warning">⚠️ คุณไม่ใช่ Admin - ปุ่มจะไม่แสดง</p>
                            @endif
                        @else
                            <p class="text-danger">❌ คุณต้อง Login ก่อน</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>รายชื่อผู้ใช้ทั้งหมด</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $users = \App\Models\User::all();
                                @endphp
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role === 'admin')
                                            <span class="badge bg-warning">Admin</span>
                                        @else
                                            <span class="badge bg-secondary">User</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="/news" class="btn btn-info">ไปหน้า News</a>
            <a href="/news/create" class="btn btn-primary">ทดสอบหน้าเพิ่มข่าว (ต้อง Login)</a>
            <a href="/test-news-create" class="btn btn-warning">ทดสอบหน้าเพิ่มข่าว (ไม่ต้อง Login)</a>
            <a href="/" class="btn btn-secondary">กลับหน้าแรก</a>
        </div>
    </div>
</body>
</html>
