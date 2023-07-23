@extends('layouts.app')
@section('title', 'Address')
@section('content')
@section('maintitle','View User Profile')

<div class="userSearchContainer">
</div>
<div class="userPanel ticketsPanel ">

    <div class="addressForm">


        @if($errors->any())
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


        @endif
        <form class="formLogin" action="/editAddress" method="post">
            @csrf
            <p class="mailTitle">Address Line:</p>

            <input type="text" id="mail" name="line" value="{{$address['line']}}" placeholder="Address" required>
            <p class="mailTitle">City:</p>
            <select onfocus="this.size=7;" onblur="this.size=1;" onchange="this.size=1; this.blur();" id="state" name="city" size="1" required>

                <option value="" disabled="" {{ $address['city'] == "" ? "selected" : "" }}>Please select a City</option>

                <option value="1" {{ $address['city'] == 1 ? "selected" : "" }}>Abu Dhalouf</option>
                <option value="2" {{ $address['city'] == 2 ? "selected" : "" }}>Abu Samra</option>
                <option value="3" {{ $address['city'] == 3 ? "selected" : "" }}>Al Aziziya</option>
                <option value="4" {{ $address['city'] == 4 ? "selected" : "" }}>Al Adaid</option>
                <option value="5" {{ $address['city'] == 5 ? "selected" : "" }}>Al Bidda</option>
                <option value="6" {{ $address['city'] == 6 ? "selected" : "" }}>Al Gharafa</option>
                <option value="7" {{ $address['city'] == 7 ? "selected" : "" }}>Ain Khaled</option>
                <option value="8" {{ $address['city'] == 8 ? "selected" : "" }}>Al Waab</option>
                <option value="9" {{ $address['city'] == 9 ? "selected" : "" }}>Old Al Ghanim</option>
                <option value="10" {{ $address['city'] == 10 ? "selected" : "" }}>Old Al Hitmi</option>

                <option value="11" {{ $address['city'] == 11 ? "selected" : "" }}>Old Alrayyan</option>

                <option value="12" {{ $address['city'] == 12 ? "selected" : "" }}>New Alrayyan</option>

                <option value="13" {{ $address['city'] == 13 ? "selected" : "" }}>New Al Hitmi</option>

                <option value="14" {{ $address['city'] == 14 ? "selected" : "" }}>Najma</option>

                <option value="15" {{ $address['city'] == 15 ? "selected" : "" }}>Muaither</option>

                <option value="16" {{ $address['city'] == 16 ? "selected" : "" }}>Muraikh</option>

                <option value="17" {{ $address['city'] == 17 ? "selected" : "" }}>Katara</option>


                <option value="19" {{ $address['city'] == 18 ? "selected" : "" }}>Duhail</option>

                <option value="20" {{ $address['city'] == 19 ? "selected" : "" }}>Lusail</option>

                <option value="21" {{ $address['city'] == 20 ? "selected" : "" }}>The Peral</option>

                <option value="22" {{ $address['city'] == 21 ? "selected" : "" }}>Umm Bab</option>

                <option value="23" {{ $address['city'] == 22 ? "selected" : "" }}>Umm Birka</option>

                <option value="24" {{ $address['city'] == 23 ? "selected" : "" }}>Umm Ghuwailina</option>

                <option value="25" {{ $address['city'] == 24 ? "selected" : "" }}>Umm Lekhba</option>

                <option value="26" {{ $address['city'] == 25 ? "selected" : "" }}>Umm Qarn</option>

            </select>

            <p class="mailTitle">State:</p>
            <select id="state" name="state" required>
                <option value="" disabled="" {{ $address['state'] == '' ? "selected" : "" }}>Please select a state</option>
                <option value="1" {{ $address['state'] == 1 ? "selected" : "" }}>Doha</option>
                <option value="2" {{ $address['state'] == 2 ? "selected" : "" }}>Al Rayyan</option>
                <option value="3" {{ $address['state'] == 3 ? "selected" : "" }}>Umm Salal</option>
            </select>

            <p class="mailTitle">Zip code:</p>
            <input type="text" id="password" name="zip" value="{{$address['zipCode']}}" placeholder="610000" required>



            <div class="addressContainer">
                <button type="submit" class="addressEdit">Edit Address</button>
                <label class="addressCancel">Cancel</button>


            </div>


        </form>
    </div>

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
