@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 90vh;">
    <div class="card shadow p-4 border-0" style="max-width: 450px; width: 100%;">

        {{-- Alert messages --}}
        @if(session('success'))
            <div class="alert alert-success text-center rounded-pill py-2">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center rounded-pill py-2">
                {{ session('error') }}
            </div>
        @endif

        <h3 class="text-center text-brown mb-4 fw-bold">Create an ITStudy Account</h3>

        <form id="registerForm" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-brown">Full Name</label>
                <input type="text" name="name" class="form-control border-brown" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-brown">Email</label>
                <input type="email" name="email" class="form-control border-brown" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-brown">Password</label>
                <input type="password" id="password" name="password" class="form-control border-brown" required>
                <div id="passwordError" class="text-danger mt-1" style="display:none;">
                    Password must be at least 8 characters, contain at least 1 number, and match confirm password.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label text-brown">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control border-brown" required>
            </div>

            <button type="submit" id="submitBtn" class="btn btn-brown w-100 rounded-pill">Register</button>

            <p class="text-center mt-3">Already have an account? 
                <a href="{{ route('login') }}" class="text-decoration-none text-brown fw-semibold">Login</a>
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

<script>
    const form = document.getElementById('registerForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    const passwordError = document.getElementById('passwordError');

    function validatePassword() {
        const value = password.value;
        const hasNumber = /\d/.test(value);
        const hasMinLength = value.length >= 8;
        const matchConfirm = value === confirmPassword.value;

        if (!hasNumber || !hasMinLength || !matchConfirm) {
            passwordError.style.display = 'block';
            return false;
        } else {
            passwordError.style.display = 'none';
            return true;
        }
    }

    password.addEventListener('input', validatePassword);
    confirmPassword.addEventListener('input', validatePassword);

    form.addEventListener('submit', function(e) {
        if (!validatePassword()) {
            e.preventDefault();
        }
    });
</script>
@endsection
