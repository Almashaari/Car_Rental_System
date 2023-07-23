@extends('layouts.app')
@section('title', 'Add Car | Admin Panel')
@section('content')


<div class="infoPanel editPanel">
    <img src="{{ asset('images/image.png')}}" alt="" class="profileImg">




    <form class="formLogin" action="/addMyCar" method="post" enctype="multipart/form-data">


        <input type="file" id="file-main" style="display:none;" name="image" onchange="readURL(this);">



        <button type="button" class="changeCarIMG" id="file-choose-btn">

            <label for="file-main">Choose your car picture</label>

        </button>



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


        {{-- <label for="image" class="changeCarIMG">Choose your car picture</label>
        <input type="file" name="image" id="image"> --}}

        @csrf
        <p class="mailTitle">Car Plate</p>
        <input type="text" id="mail" name="plate" value="" placeholder="Car Plate" required>

        <p class="mailTitle">Car Colour</p>
        <input type="text" id="password" name="colour" value="" placeholder="Car Colour" required>



        <p class="mailTitle">Car Condition</p>
        <input type="text" id="password" name="condition" value="" placeholder="Car Condition" required>


        <p class="mailTitle">Type</p>
        <input type="text" id="password" name="type" value="" placeholder="Type" required>



        <p class="mailTitle">Car Model</p>
        <input type="text" id="password" name="model" placeholder="Car Model" required>



        <p class="mailTitle">Car Year</p>
        <input type="text" id="password" name="year" placeholder="Car Year" required>



        <p class="mailTitle">Daily Price</p>
        <input type="text" id="password" name="price" placeholder="Daily Price" required>


        {{-- <button class="btn-login-submit" type="submit" value="login">Login</button> --}}
        <div class="formBtn">
            <button type="submit" class="saveACBtn">Add Car</button>

        </div>
    </form>

</div>
@endsection
@section('js')
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.profileImg').attr('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection
