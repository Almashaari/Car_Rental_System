@extends('layouts.app')
@section('title', 'Profile | Admin Panel')

@section('content')
<p class="mainText">Edit Profile</p>

<div class="infoPanel editPanel">
    <img src="{{ asset('images')}}/{{$data[0]->image}}" alt="" class="profileImg">

    <br>
    <br>


    <form class="formLogin" action="/changeProfile" method="post">
        @csrf
        <p class="mailTitle">Username : </p>
        <input type="text" id="mail" name="name" value="{{$data[0]->name}}" required placeholder="Enter Username">




        <p class="mailTitle">Email : </p>
        <input type="mail" id="mail" name="email" value="{{$data[0]->email}}" required placeholder="Enter Email">




        <p class="mailTitle">Phone : </p>
        <input type="text" id="password" name="phone" value="{{$data[0]->phone}}" placeholder="12345678">
        <p class="mailTitle">Address Line :

        </p>
        <input type='text' id="password" name="address" value="{{$address->line}}" placeholder="Address URL">


        <p class="mailTitle">City :
        </p>
        <input type='text' id="password" name="address" value="@if($address->city == 1) Abu Dhalouf
        @elseif($address->city==2) Abu Samra 
        @elseif($address->city==3) Al Aziziya

        @elseif($address->city==4) Al Adaid

         @elseif($address->city==5) Al Bidda

         @elseif($address->city==6) Al Gharafa

         @elseif($address->city==7) Ain Khaled

         @elseif($address->city==8)Al Waab

         @elseif($address->city==9) Old Al Ghanim

         @elseif($address->city==10) Old Al Hitmi

         @elseif($address->city==11) Old Alrayyan

         @elseif($address->city==12) New Alrayyan

         @elseif($address->city==13) New Al Hitmi

         @elseif($address->city==14) Najma

         @elseif($address->city==15) Muaither

         @elseif($address->city==16) Muraikh

         @elseif($address->city==17) Katara

         @elseif($address->city==18) Duhail

         @elseif($address->city==19) Lusail

         @elseif($address->city==20) The Peral

         @elseif($address->city==21) Umm Bab

         @elseif($address->city==22) Umm Birka

         @elseif($address->city==23) Umm Ghuwailina

         @elseif($address->city==24) Umm Lekhba

         @elseif($address->city==25 ) Umm Qarn


@endif
        
        
        " placeholder="Address URL">


        <p class="mailTitle">State :
        </p>
        <input type='text' id="password" name="address" value="@if($address->state == 1) Doha
        @elseif($address->city==2) Al Rayyan
        @elseif($address->city==3) Umm Salal
@endif

        
       
        
        
        
        " placeholder="Address URL">



        <p class="mailTitle">Zip code :
        </p>
        <input type='text' id="password" name="address" value="{{$address->zipCode}}" placeholder="Address URL">








    </form>

</div>
@endsection
@section('js')
<script>
    var select = document.getElementById('image');
    select.onchange = function() {
        this.form.submit();
    };

</script>
@endsection
