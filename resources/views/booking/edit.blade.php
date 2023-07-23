@extends('layouts.app')
@section('title', 'My Booking')
@section('content')
@section('maintitle','View User Profile')

<div class="userSearchContainer">
    <form action="/tickets/{{Request::segment(2)}}/search" method="get">
        @csrf
        <div class="searchContainer">

            <div class="searchRelative userSearchRelative">
                <input type="text" name="search" id="mainSearch" placeholder="Search...">
                <button type="submit" class="searchIcon"><img src="{{ asset('icons/search.png')}}" alt=""></button>
            </div>
        </div>

    </form>
</div>
<div class=" ticketsPanel bookingPanel">
    @if (session('success'))
    <div class="col-sm-12">
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    </div>
    @endif @if (session('error'))
    <div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    </div>
    @endif


    {{-- @foreach ($tickets as $ticket) --}}
    <form action="/editBooking" method="post">
        @csrf

        <div class=" BookCard">
            <img src="{{ asset('images')}}/{{$booking['car']['image']}}" alt="" class="userIMGInfo bookIMG">




            <div class="ticketIR bookInfo">
                <div class="bookingIRL">
                    <p class="UNTXT">Car Plate</p>
                    <p class="UName">{{$booking['car']['plate']}}</p>

                    <p class="UMTXT">Type</p>
                    <p class="UMail">{{$booking['car']['type']}}</p>

                    <p class="UPTXT">Car Model</p>
                    <p class="UPhone">{{$booking['car']['model']}}</p>

                    <p class="UATXT">Car Year</p>
                    <p class="UAddress">{{$booking['car']['year']}}</p>


                </div>
                <div class="bookingIRR">
                    <p class="UATXT">Car Colour</p>
                    <p class="UAddress">{{$booking['car']['colour']}}</p>

                    <p class="UATXT">Car Condition</p>
                    <p class="UAddress">{{$booking['car']['condition']}}</p>

                    <p class="UATXT">Daily Price</p>
                    <p class="UAddress">{{$booking['car']['price']}}</p>


                </div>
                <div class="showCarIRR">

                    <p class="UATXT">From</p>
                    <input type="date" id="From" name="from" value="{{$booking['dfrom']}}">
                    <input type="hidden" name="id" value="{{$booking['id']}}">

                    <p class="UATXT">To</p>
                    <input type="date" id="to" name="to" value="{{$booking['dto']}}">

                </div>

            </div>

            <button type="submit" href="" class="bookBTN">Edit</button>


        </div>
    </form>




    {{-- @endforeach --}}

</div>
@endsection
@section('js')
<script>
    function changeUserKind() {
        var userSelected = document.getElementById("users").value;
        console.log(userSelected);
        if (userSelected == 'date') {
            window.location.href = "/tickets/date";
        } else {
            window.location.href = "/tickets/status";

        }
    }

</script>
@endsection
