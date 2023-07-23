@extends('layouts.app')
@section('title', 'Show Car')
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
<div class="userPanel ticketsPanel ">


    {{-- @foreach ($tickets as $ticket) --}}
    <p>
        <div class="ticketCard">
            <img class="mainShowImg" src="{{ asset('images/carIcon.png')}}" alt="">


            <div class="showIR">
                <div class="showCarIR">
                    <p class="UNTXT">Car Plate</p>
                    <p class="UName">782042</p>
                    <p class="UMTXT">Type</p>
                    <p class="UMail">Sedan</p>
                    <p class="UPTXT">Car Model</p>
                    <p class="UPhone">Toyota Camry</p>
                    <p class="UATXT">Car Year</p>
                    <p class="UAddress">2013</p>


                </div>
                <div class="showCarIRR">

                    <p class="UATXT">Car Colour</p>
                    <p class="UAddress">Black</p>
                    <p class="UATXT">Car Condition</p>
                    <p class="UAddress">Good</p>
                    <p class="UATXT">Daily Price</p>
                    <p class="UAddress">120</p>



                </div>
                <div class="showCarIRR">

                    <p class="UATXT">From</p>
                    <input type="date" id="From" name="From">

                    <p class="UATXT">To</p>
                    <input type="date" id="to" name="to">

                </div>


            </div>

            <a href=" " class=" bookingBTN">Book</a>

        </div>
    </p>



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
