@extends('components.layout')

@section('title', 'Debug Info')
@section('description', 'Debug Information')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Debug Information</h1>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Authentication Status</h5>
                </div>
                <div class="card-body">
                    @auth
                        <p><strong>Status:</strong> <span class="text-success">Logged In</span></p>
                        <p><strong>User ID:</strong> {{ Auth::id() }}</p>
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
                        <p><strong>Is Admin:</strong> 
                            @if(Auth::user()->isAdmin())
                                <span class="text-success">Yes</span>
                            @else
                                <span class="text-danger">No</span>
                            @endif
                        </p>
                    @else
                        <p><strong>Status:</strong> <span class="text-danger">Not Logged In</span></p>
                    @endauth
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5>Button Visibility Test</h5>
                </div>
                <div class="card-body">
                    @auth
                        @if(Auth::user()->isAdmin())
                            <p class="text-success">✅ ปุ่มเพิ่มข่าวควรแสดง</p>
                            <a href="{{ route('news.create') }}" class="btn btn-primary">ทดสอบไปหน้าเพิ่มข่าว</a>
                        @else
                            <p class="text-warning">⚠️ คุณไม่ใช่ admin - ปุ่มเพิ่มข่าวจะไม่แสดง</p>
                        @endif
                    @else
                        <p class="text-danger">❌ คุณยังไม่ได้ login - ปุ่มเพิ่มข่าวจะไม่แสดง</p>
                        <a href="{{ route('login') }}" class="btn btn-success">ไปหน้า Login</a>
                    @endauth
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>All Users</h5>
                </div>
                <div class="card-body">
                    @php
                        $users = \App\Models\User::all();
                    @endphp
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
</div>
@endsection
