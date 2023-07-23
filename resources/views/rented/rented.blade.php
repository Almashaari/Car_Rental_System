@extends('layouts.app')
@section('title', 'Rented Car')
@section('content')
@section('maintitle','View User Profile')

<div class="userSearchContainer">
    <form action="/rented/search" method="get">
        @csrf
        <div class="searchContainer">

            <div class="searchRelative userSearchRelative">
                <input type="text" name="search" id="mainSearch" placeholder="Search...">
                <button type="submit" class="searchIcon"><img src="{{ asset('images/icons/search.png')}}" style='width:28px' alt=""></button>




            </div>


        </div>

    </form>
</div>
<div class="userPanel ticketsPanel rentedPanel">


    @foreach ($renteds as $rented)
    <p>
        <div class="bookingCard">
            <div class="ticketIL">
                <img src="{{ asset('images')}}/{{$rented['car']['image']}}" alt="" class="userIMGInfo">


                <p class="userIName"></p>
            </div>


            <div class="ticketIR">
                <div class="bookingIRL">
                    <p class="UNTXT">Car Plate</p>
                    <p class="UName">{{$rented['car']['plate']}}</p>

                    <p class="UMTXT">Type</p>
                    <p class="UMail">{{$rented['car']['type']}}</p>

                    <p class="UPTXT">Car Model</p>
                    <p class="UPhone">{{$rented['car']['model']}}</p>

                    <p class="UATXT">Car Year</p>
                    <p class="UAddress">{{$rented['car']['year']}}</p>

                </div>
                <div class="bookingIRR">
                    <p class="UATXT">Car Colour</p>
                    <p class="UAddress">{{$rented['car']['colour']}}</p>


                    <p class="UATXT">Car Condition</p>
                    <p class="UAddress">{{$rented['car']['condition']}}</p>


                    <p class="UATXT">Daily Price</p>
                    <p class="UAddress">{{$rented['car']['price']}}</p>

                    <?php
                    $fdate = $rented['dfrom'];

                    $tdate = $rented['dto'];


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
                    <input type="date" id="From" name="From" value="{{$rented['dfrom']}}">

                    <p class="UATXT">To</p>
                    <input type="date" id="to" name="to" value="{{$rented['dto']}}">
                    <p class="UATXT">Renter</p>

                    <p class="UAddress"><a href="/rented/profile/{{$rented['user']['id']}}">{{$rented['user']['name']}}</a></p>



                </div>

            </div>



            <div class="btnBookingContainer">
                <a href="/bookings/edit/{{$rented['id']}}" class=" bookingExtBTN">EXTEND</a>



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
