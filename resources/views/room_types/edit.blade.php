@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-4">
  <div class="card shadow-sm border-0 mx-auto p-4" style="max-width: 600px; background-color: #faf8f6;">
    <h3 class="text-center fw-bold text-brown mb-4">Edit Room Type</h3>

    
    @if (session('success'))
      <div class="alert alert-success text-center rounded-pill py-2">{{ session('success') }}</div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger text-center rounded-pill py-2">{{ session('error') }}</div>
    @endif

    <form action="{{ route('room-types.update', $roomType->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label text-brown fw-semibold">Name</label>
        <input type="text" name="name" class="form-control border-brown rounded-pill px-3" 
               value="{{ $roomType->name }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label text-brown fw-semibold">Description</label>
        <textarea name="description" class="form-control border-brown rounded-4 px-3" rows="4">{{ $roomType->description }}</textarea>
      </div>

      <div class="d-flex justify-content-center gap-3 mt-4">
        <button type="submit" class="btn btn-brown rounded-pill px-4">Update</button>
        <a href="{{ route('room-types.index') }}" class="btn btn-secondary rounded-pill px-4">Cancel</a>
      </div>
    </form>
  </div>
</div>

<style>
  .form-control:focus {
    border-color: #4b1f0e;
    box-shadow: 0 0 0 0.2rem rgba(75, 31, 14, 0.25);
  }
</style>
@endsection
