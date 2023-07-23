<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="loginContainer">


        <div class="logoForm">
            <img src="{{ asset('images/icons/car-icon.jpg')}}" alt="" class="logoSign">




            <form class="formSign" method="POST" action="{{ route('register') }}">
                @if($errors->any())
                {!! implode('', $errors->all('<div style="color:red;margin:10px 0px;">:message</div>')) !!}
                @endif

                @csrf
                <p class="mailTitle">UserName : </p>
                <input type="text" id="mail" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Username">


                <p class="mailTitle">Email : </p>

                <input type="text" id="mail" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">

                <p class="mailTitle">Password : </p>
                <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Enter Password">
                <p class="mailTitle">Password Confirm : </p>
                <input type="password" id="password" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Password Confirm">



                <p class="createNow">Already have an account? <a href="/login" class="forgetTXT">Sign in</a></p>

                <button class="btn-login-submit" type="submit" value="login">sign up</button>
            </form>
        </div>
    </div>
</body>
</html>
