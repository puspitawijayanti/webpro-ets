@extends('layouts.app')
@section('content')

<div class="container py-5 booking-page">
    <div class="row justify-content-center text-center mb-4">
        <h3 style="color:#4b1f0e; font-weight:700;">Booking</h3>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-3">
            <div class="card booking-card shadow-sm border-0">
                <img src="{{ asset('img/booking/individual-desk.jpg') }}" alt="Individual Desk" class="img-fluid rounded-top">
                <div class="card-body">
                    <h5 class="card-title fw-semibold text-brown mb-3">Individual Desk</h5>
                    <a href="{{ route('booking.individual') }}" class="btn btn-brown w-100 rounded-pill py-2">Book Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card booking-card shadow-sm border-0">
                <img src="{{ asset('img/booking/group-desk.jpg') }}" alt="Group Desk" class="img-fluid rounded-top">
                <div class="card-body">
                    <h5 class="card-title fw-semibold text-brown mb-3">Group Desk</h5>
                    <a href="{{ route('booking.group') }}" class="btn btn-brown w-100 rounded-pill py-2">Book Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card booking-card shadow-sm border-0">
                <img src="{{ asset('img/booking/vip-room.jpg') }}" alt="VIP Room" class="img-fluid rounded-top">
                <div class="card-body">
                    <h5 class="card-title fw-semibold text-brown mb-3">VIP Room</h5>
                    <a href="{{ route('booking.vip') }}" class="btn btn-brown w-100 rounded-pill py-2">Book Now</a>
                </div>
            </div>
        </div>
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

.btn-brown {
    background-color: #4b1f0e;
    color: #fff;
    font-weight: 600;
    border-radius: 25px;
    transition: all 0.3s ease-in-out;
}
.btn-brown:hover {
    background-color: #6b2f1b;
    color: #fff;
}

.booking-card {
    background-color: #fff8f3;
    border-radius: 20px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.booking-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.booking-card img {
    height: 200px;
    width: 100%;
    object-fit: cover;
}

.card-title {
    color: #4b1f0e;
    font-weight: 600;
}

.booking-page {
    margin-top: 100px;
    margin-bottom: 50px;
}
</style>
@endsection
