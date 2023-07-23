@extends('layouts.app')
@section('title', 'Home | Admin Panel')
@section('content')


<p class="mainText">Home Page</p>

<div class="infoPanel homePanel">
    <a href="/rented">
        <div class="hCard">
            <img src="{{ asset('images/car-rental.png')}}" alt="" class="cardImg">
            <p class="cardTxt">Rented Cars</p>
        </div>
    </a>
    <a href="/profile">

        <div class="hCard">
            <img src="{{ asset('images/story.png')}}" alt="" class="cardImg">

            <p class="cardTxt">View Profile</p>
        </div>
    </a>
    <div class="clear"></div>
    @if(Auth()->user()->role == 1)

    <a href="/cars">


        <div class="hCard">
            <img src="{{ asset('images/carBNG.png')}}" alt="" class="cardImg">

            <p class="cardTxt">Cars</p>
        </div>
    </a>
    @endif @if(Auth()->user()->role == 0)

    <a href="/mycars">

        <div class="hCard">
            <img src="{{ asset('images/car.png')}}" alt="" class="cardImg">

            <p class="cardTxt">My Cars</p>
        </div>
    </a>
    @endif

    {{-- @if(Session::get('role') == 'a')
    <a href="/register/staff">
        <div class="hCard">
            <img src="{{ asset('images/newstaff.png')}}" alt="" class="cardImg">
    <p class="cardTxt">Register New Staff</p>
</div>
</a>


@endif --}}
@if(Auth()->user()->role == 1)

<a href="/bookings">

    <div class="hCard">
        <img src="{{ asset('images/booking.png')}}" alt="" class="cardImg">
        <p class="cardTxt">View My Booking</p>

    </div>
</a>
@endif
@if(Auth()->user()->role == 1)


<a href="/address">

    <div class="hCard">
        <img src="{{ asset('images/address.png')}}" alt="" class="cardImg">
        <p class="cardTxt">Address</p>
    </div>
</a>
@endif


</div>
@endsection
