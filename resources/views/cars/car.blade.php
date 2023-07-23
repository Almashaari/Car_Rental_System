@extends('layouts.app')
@section('title', 'Cars')
@section('content')
@section('maintitle','View User Profile')

<div class="userSearchContainer">
    <form action="/cars" method="get">
        @csrf
        <div class="searchContainer">

            <div class="searchRelative userSearchRelative">
                <input type="text" name="search" id="mainSearch" placeholder="Search...">
                <button type="submit" class="searchIcon"><img src="{{ asset('/images/icons/search.png')}}" style='width:30px' alt=""></button>
            </div>
        </div>

    </form>
</div>
<div class="userPanel ticketsPanel carPanel">


    @foreach ($cars as $car)
    <p>
        <div class="ticketCard">
            <div class="ticketIL carIL">
                <img src="{{ asset('images')}}/{{$car['image']}}" alt="" class="userIMGInfo">



                <p class="userIName"></p>
            </div>


            <div class="ticketIR">
                <div class="ticketIRL">
                    <p class="UNTXT">Car Plate</p>
                    <p class="UName">{{$car['plate']}}</p>

                    <p class="UMTXT">Type</p>
                    <p class="UMail">{{$car['type']}}</p>

                    <p class="UPTXT">Car Model</p>
                    <p class="UPhone">{{$car['model']}}</p>

                    <p class="UATXT">Car Year</p>
                    <p class="UAddress">{{$car['year']}}</p>



                </div>
                <div class="ticketIRR">
                    <p class="UATXT">Car Colour</p>
                    <p class="UAddress">{{$car['colour']}}</p>

                    <p class="UATXT">Car Condition</p>
                    <p class="UAddress">{{$car['condition']}}</p>

                    <p class="UATXT">Daily Price</p>
                    <p class="UAddress">{{$car['price']}}</p>


                    <a href="/cars/booking/{{$car['id']}}" class=" bookingBTN">Book</a>

                </div>

            </div>
        </div>
    </p>


    @endforeach

</div>
@endsection
@section(' js') @endsection
