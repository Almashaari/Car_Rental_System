@extends('layouts.app')
@section('title', 'Edit Profile | Admin Panel')
@section('content')
<p class="mainText">Edit Profile</p>

<div class="infoPanel editPanel">
    <img src="{{ asset('images')}}/{{$data[0]->image}}" alt="" class="profileImg">

    <form action="/uploadUserImage" method="post" enctype="multipart/form-data">
        @csrf
        <label for="image" class="changePicture">Change your profile picture</label>
        <input type="file" name="image" id="image">
    </form>

    <form class="formLogin" action="/changeProfile" method="post">
        @csrf
        <p class="mailTitle">Username : </p>
        <input type="text" id="mail" name="name" value="{{$data[0]->name}}" required placeholder="Enter Username">




        <p class="mailTitle">Email : </p>
        <input type="mail" id="mail" name="email" value="{{$data[0]->email}}" required placeholder="Enter Email">




        <p class="mailTitle">Phone : </p>
        <input type="text" id="password" name="phone" value="{{$data[0]->phone}}" placeholder="12345678">
        <p class="mailTitle">Address : </p>
        <input type='url' id="password" name="address" value="{{$data[0]->address}}" placeholder="Address URL">


        <p class="mailTitle">Password</p>
        <input type="Password" id="password" name="password" autocomplete="new-password" placeholder="Enter Password">


        {{-- <button class="btn-login-submit" type="submit" value="login">Login</button> --}}
        <div class="formBtn">
            <button type="submit" class="saveEPBtn">Edit Profile</button>
            <a href="/profile" class="cancelEPBtn">Cancel</a>
        </div>
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
