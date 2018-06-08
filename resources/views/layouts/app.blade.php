<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>The Wings Awards</title>

        <link rel="shortcut icon" href="{{ asset('img/wings_triangle_0PE_icon.ico') }}" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600|Open+Sans:300,400,500,600|Roboto" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('css')
    </head>
    <body>
        <div id="app">
            <div class="nav">
                <div class="container">
                    <div class="nav-pic">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/wings.png') }}" alt="Wings" width="120"></a>
                    </div>
                    @auth
                        <a href="#" id="menu-trigger" class="hamburger-trigger"><img src="{{ asset('img/icons8-menu.svg') }}" alt="Hamburger"></a>
                        <div class="menu" id="menu">
                            <ul class="nav-ul">
                                <li><a href="{{ route('nominate') }}">Nominate</a></li>
                                <li><a href="{{ route('nominations') }}">Edit Nominations</a></li>
                                <li><a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fthewings.xyz&via=the13thset&text=Honour%20your%20hero%21%20The%20Wings%20Award%20brought%20to%20you%20by%20the%20Regal%20Set%2C%20CU.&hashtags=The13thSet%2CRegalSet%2CTheWingsAwards" target="_blank" class="golden-link" onclick="window.open('https://twitter.com/intent/tweet?url=http%3A%2F%2Fthewings.xyz&via=the13thset&text=Honour%20your%20hero%21%20The%20Wings%20Award%20brought%20to%20you%20by%20the%20Regal%20Set%2C%20CU.&hashtags=The13thSet%2CRegalSet%2CTheWingsAwards', 'name', 'width=550,height=420')">Tweet at us!</a></li>
                                {{-- <li><a href="{{ route('terms') }}">Terms</a></li> --}}
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>

            <div class="body">
                <div class="container">
                    <div class="pictures">
                            <img class="bg bg-1" src="{{ asset('img/Suit.png') }}" alt="Suit">
                    </div>
                    <div class="con">
                        @yield('content')
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('js')
        <script>
            $(document).ready(function() {
                setInterval(function() {
                    if(Math.random() >= 0.5) {
                        $(".bg").fadeOut(1000, function() {
                            if($(this).attr("src") === "{{ asset('img/Gown.png') }}") {
                                $(this).attr("src", "{{ asset('img/Suit.png') }}");
                            } else {
                                $(this).attr("src", "{{ asset('img/Gown.png') }}");
                            }
                            $(this).on('load', function() {
                                $(this).fadeIn(1000);
                            });
                        });
                    }
                }, 7000);

                $('#menu-trigger').click(function() {
                    $('#menu').slideToggle(500);
                })
            })
        </script>
    </body>
</html>
