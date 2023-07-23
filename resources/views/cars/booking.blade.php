@extends('layouts.app')
@section('title', 'My Booking')
@section('content')
@section('maintitle','View User Profile')


<div class=" ticketsPanel bookingPanel">

    {{-- @foreach ($tickets as $ticket) --}}

    <div class=" BookCard">
        <img src="{{ asset('images')}}/{{$car[0]['image']}}" alt="" class="userIMGInfo bookIMG">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

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





        <div class="ticketIR bookInfo">
            <div class="bookingIRL">
                <p class="UNTXT">Car Plate</p>
                <p class="UName">{{$car[0]['plate']}}</p>

                <p class="UMTXT">Type</p>
                <p class="UMail">{{$car[0]['type']}}</p>

                <p class="UPTXT">Car Model</p>
                <p class="UPhone">{{$car[0]['model']}}</p>

                <p class="UATXT">Car Year</p>
                <p class="UAddress">{{$car[0]['year']}}</p>



            </div>
            <div class="bookingIRR">
                <p class="UATXT">Car Colour</p>
                <p class="UAddress">{{$car[0]['colour']}}</p>

                <p class="UATXT">Car Condition</p>
                <p class="UAddress">{{$car[0]['condition']}}</p>

                <p class="UATXT">Daily Price</p>
                <p class="UAddress">{{$car[0]['price']}}</p>



            </div>
            <div class="showCarIRR">

                <form action="/booking" method="post" id='bookingForm'>
                    @csrf
                    <input type="text" style="display:none;" name="id" value="{{$car[0]['id']}}">

                    <p class="UATXT">From</p>
                    <input type="date" id="From" name="from" required>

                    <p class="UATXT">To</p>
                    <input type="date" id="to" name="to" required>


                </form>
            </div>
        </div>


        <div class="formBtnBooking">
            <button type="submit" class="saveBBtn" id='bookBTN'>BOOK</button>



        </div>





    </div>




    {{-- @endforeach --}}

</div>
@endsection
@section('js')
<script>
    var form = document.getElementById("bookingForm");


    document.getElementById("bookBTN").addEventListener("click", function() {

        form.submit();
    });

</script>
@endsection
