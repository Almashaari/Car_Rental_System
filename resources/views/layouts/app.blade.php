<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('header')
</head>
<body>
    <div id="app">

        <nav>
            <div class="logoContainer">Eztrip</div>
            {{-- <div class="searchContainer">
            <div class="searchRelative">
                <input type="text" name="search" id="mainSearch" placeholder="Search...">
                <img src="{{ asset('icons/search.png')}}" alt="" class="searchIcon">
    </div>
    </div> --}}

    </nav>
    <div class="content">
        <div class="sidebar">
            <div class="userInfo">
                <div class="imgContainer"><img src="{{ asset('images')}}/{{Auth()->user()->image}}" alt="user image" class="userIMG"></div>



                <div class="userDetail">
                    <p class="userName">{{Auth()->user()->name}}</p>


                    <p class="userRole">@if(Auth()->user()->role == 0)Admin @else User @endif</p>

                </div>
            </div>

            <div class="menuItem @if( Request::segment(1) == null )active @endif">
                <a href="/" class="menuILink">Home Page</a>
                <div class="menuIconCont"> </div>
            </div>
            <div class="menuItem @if( Request::segment(1) == 'profile' )active @endif">
                <a href="/profile" class="menuILink">View Profile</a>

                <div class="menuIconCont"> </div>
            </div>
            {{-- <div class="menuItem @if( Request::segment(1) == 'users' )active @endif">
                <a href="/users/resident" class="menuILink">View User Profile</a>
                <div class="menuIconCont"> <i class="medium material-icons menuIIcon">person_outline</i></div>
            </div> --}}
            @if(Auth()->user()->role == 1)

            <div class="menuItem @if( Request::segment(1) == 'report' )active @endif">

                <a href="/cars" class="menuILink ">Cars</a>
                <div class="menuIconCont"></div>


            </div>
            @endif
            @if(Auth()->user()->role == 0)

            <div class="menuItem @if( Request::segment(1) == 'report' )active @endif">
                <a href="/mycars" class="menuILink ">My Cars</a>

                <div class="menuIconCont"></div>



            </div>
            @endif
            @if(Auth()->user()->role == 0)

            <div class="menuItem @if( Request::segment(1) == 'report' )active @endif">
                <a href="/rented" class="menuILink ">Rented Cars</a>
                <div class="menuIconCont"></div>
            </div>
            @endif
            @if(Auth()->user()->role == 1)


            <div class="menuItem  @if( Request::segment(1) == 'register' )active @endif">
                <a href="/bookings" class="menuILink">View My booking</a>


                <div class="menuIconCont"></div>
            </div>
            @endif
            @if(Auth()->user()->role == 1)

            <div class="menuItem  @if( Request::segment(1) == 'tickets' )active @endif">
                <a href="/address" class="menuILink">Address</a>

                <div class="menuIconCont"> </div>
            </div>
            @endif
            @if(Auth()->user()->role == 0)

            <div class="menuItem  @if( Request::segment(1) == 'announcement' )active @endif">
                <a href="/support" class="menuILink">Customer Service</a>

                <div class="menuIconCont"> </div>
            </div>
            @endif @if(Auth()->user()->role == 1)

            <div class="menuItem  @if( Request::segment(1) == 'announcement' )active @endif">
                <a href="/support/user" class="menuILink">Customer Service</a>


                <div class="menuIconCont"> </div>
            </div>
            @endif


            <div class="menuItem ">
                <a href=" {{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="menuILink">Sign out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


                <div class="menuIconCont"></div>
            </div>
        </div>
        <div class="contentContainer">

            @yield('content')
        </div>
    </div>
    </div>
    <script src="/jquery/jquery.min.js"></script>


    <script src="{{ asset('js/app.js') }}"></script>



    @yield('js')
</body>
</html>
