@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card shadow p-4 border-0" style="max-width: 400px; width: 100%;">

        {{-- Alert masuk di sini --}}
        @if (session('error'))
            <div class="alert alert-danger text-center rounded-pill py-2">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success text-center rounded-pill py-2">{{ session('success') }}</div>
        @endif

        <h3 class="text-center text-brown mb-4 fw-bold">Login to ITStudy</h3>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-brown">Email</label>
                <input type="email" name="email" class="form-control border-brown" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-brown">Password</label>
                <input type="password" name="password" class="form-control border-brown" required>
            </div>
            <button type="submit" class="btn btn-brown w-100 rounded-pill">Login</button>
            <p class="text-center mt-3">Don't have an account? 
                <a href="{{ route('register') }}" class="text-decoration-none text-brown fw-semibold">Register</a>
            </p>
        </form>
    </div>
</div>

<style>
body {
    background-color: #f6f0ea;
    font-family: "Poppins", sans-serif;
    color: #4b1f0e;
}

.text-brown {
    color: #4b1f0e;
}

.border-brown {
    border-color: #4b1f0e !important;
}

.btn-brown {
    background-color: #4b1f0e;
    color: white;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-brown:hover {
    background-color: #6b2f1b;
}

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    transition: 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
}

.alert {
    font-size: 0.9rem;
}
</style>
@endsection
