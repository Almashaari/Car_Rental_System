@extends('layouts.app')
@section('title', 'Profile')
@section('content')

<p class="mainText">Profile</p>

<div class="infoPanel">
    <img src="{{ asset('images/profile.png')}}" alt="" onclick='showImgPanel(this);' class="profileImg">



    <p class="pUserName"></p>

    {{-- <p class="pUserRole">@if($data[4] == 'a') Admin @else Staff @endif</p> --}}
    <hr />
    <div class="pUserInfo">
        <div class="profileItem">
            <p class="pFullNameTxt">Full Name</p>
            <p class="pFullName">Neve</p>
        </div>
        <div class="profileItem">
            <p class="pFullNameTxt">Email</p>
            <p class="pFullName">neve@gmail.com</p>
        </div>
        <div class="profileItem">
            <p class="pFullNameTxt">phone</p>
            <p class="pFullName">+2658658885</p>
        </div>
    </div>
    <a href="/profile/edit" class="editProf">Edit Profile</a>

</div>

<div class="imgShowContainer" id="imgShowContainer">
    <p class="closePanel" onclick='closePanel()'>X</p>
    <img src="" alt="" class="imgPanel" id="imgPanel">

</div>

@endsection
@section('js')
<script>
    function closePanel() {
        document.getElementById("imgShowContainer").style.display = "none";
    }

    function showImgPanel(src) {
        var imageSrc = src.getAttribute("src");
        document.getElementById("imgShowContainer").style.display = "block";
        document.getElementById("imgPanel").setAttribute("src", imageSrc);
    }

</script>
@endsection
