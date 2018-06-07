<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>The Wings Awards</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('css')
    </head>
    <body>
        <div id="app">
            <div id="app">
                <section class="navigation">
                <div class="container">
                    <div class="row">
                    <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                        <div class="form-header">
                        <div class="profile">
                            <a href="{{ route('home') }}">
                                <img class="profile-pic" src="{{ asset('img/wings.png') }}" width="300">
                            </a>
                            <div class="profile-desc">We celebrate spectacular individuals – Covenant University Eagles, graduating students and staff – doing extraordinary work.</div>
                        </div>

                        <div class="navigation-box">
                            @auth
                            <div>
                                <div class="welcome-text">Welcome, <b>{{ Auth::user()->name }}</b> ({{ Auth::user()->email }})</div>

                                <div class="navigation-links links">
                                    <a href="{{ route('nominate') }}">Nominate</a>
                                    <a href="{{ route('nominations') }}">Edit Nominations</a>
                                    <a
                                    href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fthewings.xyz&via=the13thset&text=Honour%20your%20hero%21%20The%20Wings%20Award%20brought%20to%20you%20by%20the%20Regal%20Set%2C%20CU.&hashtags=The13thSet%2CRegalSet%2CTheWingsAwards"
                                    target="_blank" class="golden-link"
                                    onclick="window.open('https://twitter.com/intent/tweet?url=http%3A%2F%2Fthewings.xyz&via=the13thset&text=Honour%20your%20hero%21%20The%20Wings%20Award%20brought%20to%20you%20by%20the%20Regal%20Set%2C%20CU.&hashtags=The13thSet%2CRegalSet%2CTheWingsAwards', 'name', 'width=550,height=420')">Tweet at us!</a>
                                    <a href="{{ route('logout') }}">Logout</a>
                                </div>
                            </div>
                            @endauth
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </section>

                <section class="content">
                    @yield('content')
                </section>

                <section class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                                <div class="footer-sub">
                                    <div class="footer-text">Regal Set, Class of 2018 <br> Covenant University, Ota</div>

                                    <div class="footer-links links">
                                        <div class="footer-links-terms">
                                            <a href="{{ route('terms') }}">Terms and conditions</a>
                                        </div>
                                        <div class="footer-links-follow">Follow us on <a href="https://twitter.com/The13thSet" target="_blank">Twitter</a> and <a href="https://www.instagram.com/the13thset/" target="_blank">Instagram</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('js')
    </body>
</html>
