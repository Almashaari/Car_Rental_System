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

        </p>
        <div class="logoForm">
            <img src="{{ asset('images/icons/car-icon.jpg')}}" alt="" class="logoLogin">




            <form class="formForget" action="{{ route('reset.password.post') }}" method="POST">


                @if($errors->any())
                {!! implode('', $errors->all('<div style="color:red;margin:10px 0px;">:message</div>')) !!}
                @endif


                @csrf
                <input type="hidden" name="token" value="{{ $token }}">


                <p class="logoTXt forgetTXt">Reset Password</p>


                <p class="mailTitle"> Email : </p>
                <input type="email" id="mail" name="email" placeholder="Enter Email " required autofocus>
                <p class="mailTitle"> Password : </p>
                <input type="password" id="mail" name="password" placeholder="Enter Password " required autofocus>

                <p class="mailTitle">Confirm Password : </p>

                <input type="password" id="mail" name="password_confirmation" placeholder="Enter Confirm Password " required autofocus>







                <button class="btn-login-submit" type="submit" value="login">Send Email</button>
            </form>
        </div>
    </div>
</body>
</html>
