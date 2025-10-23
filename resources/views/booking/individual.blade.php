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
                <img src="{{ asset('img/booking/individual-desk.jpg') }}" 
                     alt="Individual Desk"
                     class="img-fluid rounded shadow-sm mb-3 booking-image"
                     style="max-height:400px;object-fit:cover;">
                <h6 class="fw-semibold text-brown">Individual Desk</h6>
                <p class="fw-bold text-brown mb-0">Rp4.000/hour</p>
            </div>

            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow-sm border border-brown text-center">
                    <div class="text-center mb-4">
                        <label for="bookingDate" class="form-label fw-semibold text-brown">
                            <i class="bi bi-calendar-week"></i> Choose Date
                        </label>
                        <input type="date" id="bookingDate"
                            class="form-control text-center border-2 border-brown mx-auto"
                            style="max-width: 250px; border-radius: 25px; cursor: pointer;">
                    </div>

                    <div class="seat-grid text-center">
                        @for ($i = 1; $i <= 28; $i++)
                            <button type="button" class="seat-btn">A{{ $i }}</button>
                            @if ($i % 7 == 0)
                                <br>
                            @endif
                        @endfor
                    </div>
                </div>

                <form action="{{ route('booking.time') }}" method="POST" class="text-end mt-3">
                    @csrf
                    <input type="hidden" name="room_type" value="Individual Desk">
                    <input type="hidden" name="desk_number" id="desk_number">
                    <input type="hidden" name="date" id="selected_date">
                    <input type="hidden" name="price" value="4000">

                    <button id="nextButton" type="submit" class="btn btn-brown rounded-pill px-5 py-2" disabled>
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
    const deskInput = document.getElementById('desk_number');
    const nextButton = document.getElementById('nextButton');

    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    const todayStr = `${yyyy}-${mm}-${dd}`;
    dateInput.value = todayStr;
    selectedDateInput.value = todayStr;

    dateInput.addEventListener('change', function () {
        selectedDateInput.value = this.value;
        checkNextAvailability();
    });

    seatButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            seatButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            deskInput.value = this.textContent.trim();
            checkNextAvailability();
        });
    });

    function checkNextAvailability() {
        nextButton.disabled = !(deskInput.value && selectedDateInput.value);
    }
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
    transition: all 0.3s ease-in-out;
}
.btn-brown:hover {
    background-color: #6b2f1b;
}
.btn-brown:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.seat-btn {
    border: 2px solid #5c2e00;
    color: #5c2e00;
    background-color: white;
    border-radius: 25px;
    margin: 5px;
    padding: 6px 20px;
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
</style>
@endsection
