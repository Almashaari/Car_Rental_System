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




            <form class="formForget" action="{{ route('forget.password.post') }}" method="POST">

                @if($errors->any())
                {!! implode('', $errors->all('<div style="color:red;margin:10px 0px;">:message</div>')) !!}
                @endif
                @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif



                @csrf
                <p class="logoTXt forgetTXt">Forget Password</p>

                <p class="mailTitle">Email : </p>
                <input type="text" id="mail" name="email" placeholder="Enter Email">

                <button class="btn-login-submit" type="submit" value="login">Send Email</button>
            </form>
        </div>
    </div>
</body>
</html>
