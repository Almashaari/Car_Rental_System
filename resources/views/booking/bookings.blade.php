@extends('layouts.app')
@section('title', 'Rented Car')
@section('content')
@section('maintitle','View User Profile')

<div class="userSearchContainer">
    <form action="/bookings/search" method="get">
        @csrf
        <div class="searchContainer">

            <div class="searchRelative userSearchRelative">
                <input type="text" name="search" id="mainSearch" placeholder="Search...">
                <button type="submit" class="searchIcon"><img src="{{ asset('images/icons/search.png')}}" alt="" style='width:28px'></button>


            </div>


        </div>

    </form>
</div>
<div class="userPanel ticketsPanel bookingsPanel">
    @foreach ($bookings as $book)
    <p>
        <div class="bookingCard">
            <div class="ticketIL">
                <img src="{{ asset('images')}}/{{$book['car']['image']}}" alt="" class="userIMGInfo">


                <p class="userIName"></p>
            </div>


            <div class="ticketIR">
                <div class="bookingIRL">
                    <p class="UNTXT">Car Plate</p>
                    <p class="UName">{{$book['car']['plate']}}</p>

                    <p class="UMTXT">Type</p>
                    <p class="UMail">{{$book['car']['type']}}</p>

                    <p class="UPTXT">Car Model</p>
                    <p class="UPhone">{{$book['car']['model']}}</p>

                    <p class="UATXT">Car Year</p>
                    <p class="UAddress">{{$book['car']['year']}}</p>

                </div>
                <div class="bookingIRR">
                    <p class="UATXT">Car Colour</p>
                    <p class="UAddress">{{$book['car']['colour']}}</p>


                    <p class="UATXT">Car Condition</p>
                    <p class="UAddress">{{$book['car']['condition']}}</p>


                    <p class="UATXT">Daily Price</p>
                    <p class="UAddress">{{$book['car']['price']}}</p>

                    <?php
                    $fdate = $book['dfrom'];
                    $tdate = $book['dto'];

                    $datetime1 = new DateTime($fdate);
                    $datetime2 = new DateTime($tdate);
                    $interval = $datetime1->diff($datetime2);
                   

                    $days = $interval->format('%a');

                    ?>


                    <p class="UATXT"> Days</p>
                    <p class="UAddress">{{$days + 1}}</p>




                </div>
                <div class="showCarIRR">

                    <p class="UATXT">From</p>
                    <input type="date" id="From" name="From" value="{{$book['dfrom']}}">

                    <p class="UATXT">To</p>
                    <input type="date" id="to" name="to" value="{{$book['dto']}}">

                </div>

            </div>

            <div class="btnBookingContainer">
                <a href="/bookings/delete/{{$book['id']}}" class=" bookingExtBTN">DELETE</a>
            </div>
            <div class="btnBookingContainer">
                <a href="/bookings/edit/{{$book['id']}}" class=" bookingExtBTN">EXTEND</a>
            </div>


        </div>
    </p>




    @endforeach

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
