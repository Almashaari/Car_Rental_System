@extends('layouts.app')
@section('title', 'Cars')
@section('content')
@section('maintitle','View User Profile')

<div class="userSearchContainer">
    <form action="/mycars" method="post">

        @csrf
        <div class="searchContainer">

            <div class="searchRelative userSearchRelative">
                <input type="text" name="search" id="mainSearch" placeholder="Search...">
                <button type="submit" class="searchIcon">Search</button>


            </div>
            <a href="/mycars/add" class=" addCarBTN">ADD CAR</a>

        </div>

    </form>
</div>
<div class="userPanel ticketsPanel carPanel">
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
    @foreach ($cars as $car)

    <div class="carCard">
        <div>
            <div class="ticketIL carIL">
                <img src="{{ asset('images')}}/{{$car['image']}}" alt="" class="userIMGInfo">

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


                    {{--
                   --}}

                </div>

            </div>

        </div>
        <a href="mycars/edit/{{$car['id']}}" class=" carBTN">UPDATE CAR</a>

        <a href="mycars/delete/{{$car['id']}}" class=" carBTN">DELETE CAR</a>


    </div>

    @endforeach






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
