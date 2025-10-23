@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-4">
  <div class="card shadow-sm border-0 p-4" style="background-color: #faf8f6;">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="fw-bold text-brown m-0">Room Type List</h3>
      <a href="{{ route('room-types.create') }}" class="btn btn-brown rounded-pill px-4">
        <i class="bi bi-plus-lg"></i> Add Room Type
      </a>
    </div>

    {{-- Alert Section --}}
    @if(session('success'))
      <div class="alert alert-success text-center rounded-pill py-2">{{ session('success') }}</div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger text-center rounded-pill py-2">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
      <table class="table table-bordered align-middle text-center">
        <thead class="table-light">
          <tr>
            <th style="width: 60px;">#</th>
            <th style="width: 200px;">Name</th>
            <th>Description</th>
            <th style="width: 180px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($roomTypes as $type)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td class="fw-semibold">{{ $type->name }}</td>
              <td>{{ $type->description }}</td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <a href="{{ route('room-types.edit', $type->id) }}" class="btn btn-warning btn-sm rounded-pill px-3">
                    <i class="bi bi-pencil-square"></i> Edit
                  </a>
                  <form action="{{ route('room-types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                      <i class="bi bi-trash"></i> Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center text-muted py-4">No Room Types found</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<style>
  .table th {
    background-color: #f1e4da !important;
    color: #4b1f0e;
  }
  .table td, .table th {
    vertical-align: middle;
  }
  .btn-warning {
    background-color: #ffc107;
    border: none;
  }
  .btn-warning:hover {
    background-color: #e0a800;
  }
  .btn-danger {
    background-color: #b02a37;
    border: none;
  }
  .btn-danger:hover {
    background-color: #8a1f2b;
  }
</style>
@endsection
