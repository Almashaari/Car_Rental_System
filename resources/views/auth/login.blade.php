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



            <form class="formLogin" method="POST" action="{{ route('login') }}">

                @if($errors->any())
                {!! implode('', $errors->all('<div style="color:red;margin:10px 0px;">:message</div>')) !!}
                @endif


                @csrf
                <p class=" mailTitle">Username : </p>
                <input type="text" id="mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter Username" autofocus>




                <p class="mailTitle">password</p>
                <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">



                <label class="rememberMe">

                    <input type="checkbox" checked="checked" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me

                </label>
                <div>
                    <p class="createNow">Create new <a href="/signup" class="forgetTXT">account</a></p>

                    <a href="/forget" class="forgetTXT">Forget Password</a>
                    <button class="btn-login-submit loginP" type="submit" value="login">Login</button>



                </div>



            </form>
        </div>
    </div>
</body>
</html>
