@extends('layouts.app')
@section('content')

<div class="container my-5">
    <div class="card shadow-sm border-0 p-4" style="background-color: #faf8f6;">
        <div class="mb-3">
            <a href="{{ route('booking') }}" class="text-decoration-none text-brown fw-semibold">
                <i class="bi bi-arrow-left"></i> Prev
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset('img/booking/group-desk.jpg') }}" 
                     alt="Group Desk"
                     class="img-fluid rounded shadow-sm mb-3 booking-image"
                     style="max-height: 400px; object-fit: cover;">
                <h6 class="fw-semibold text-brown">Group Desk</h6>
                <p class="fw-bold text-brown mb-0">Rp35.000/hour with 10 desk</p>
            </div>

            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow-sm border border-brown">
                    <div class="text-center mb-4">
                        <label for="bookingDate" class="form-label fw-semibold text-brown">
                            <i class="bi bi-calendar-week"></i> Choose Date
                        </label>
                        <input type="date" id="bookingDate"
                               class="form-control text-center border-2 border-brown mx-auto"
                               style="max-width: 250px; border-radius: 25px; cursor: pointer;">
                    </div>

                    <div class="text-center seat-grid">
                        @foreach (['B1', 'B2', 'B3', 'B4'] as $seat)
                            <button type="button" class="seat-btn">{{ $seat }}</button>
                        @endforeach
                    </div>
                </div>

                <form action="{{ route('booking.time') }}" method="POST" class="text-end mt-3">
                    @csrf
                    <input type="hidden" name="room_type" value="Group Desk">
                    <input type="hidden" name="desk_number" id="desk_number">
                    <input type="hidden" name="date" id="selected_date">
                    <input type="hidden" name="price" value="35000">
                    <button id="nextButton" type="submit"
                            class="btn btn-brown rounded-pill px-5 py-2"
                            disabled>
                        Next →
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const dateInput = document.getElementById('bookingDate');
    const selectedDateInput = document.getElementById('selected_date');
    const seatButtons = document.querySelectorAll('.seat-btn');
    const nextButton = document.getElementById('nextButton');
    const deskInput = document.getElementById('desk_number');

    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    const todayFormatted = `${yyyy}-${mm}-${dd}`;
    dateInput.value = todayFormatted;
    selectedDateInput.value = todayFormatted;

    dateInput.addEventListener('change', () => {
        selectedDateInput.value = dateInput.value;
    });

    let selectedSeat = null;
    seatButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            seatButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            selectedSeat = this.textContent.trim();
            deskInput.value = selectedSeat;

            nextButton.disabled = false;
        });
    });
});
</script>

<style>
.text-brown { color: #4b1f0e; }
.border-brown { border-color: #4b1f0e !important; }
.btn-brown {
    background-color: #4b1f0e;
    color: #fff;
    font-weight: 600;
    border-radius: 25px;
    transition: 0.3s ease;
}
.btn-brown:hover { background-color: #6b2f1b; color: #fff; }

.seat-btn {
    border: 2px solid #5c2e00;
    color: #5c2e00;
    background-color: white;
    border-radius: 25px;
    margin: 6px;
    padding: 10px 20px;
    font-weight: 600;
    transition: all 0.2s ease-in-out;
}
.seat-btn:hover {
    background-color: #5c2e00;
    color: white;
}
.seat-btn.active {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: white;
}
.btn-brown:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
@endsection
