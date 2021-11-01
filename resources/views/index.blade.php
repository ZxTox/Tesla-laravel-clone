@extends("layouts/master")

@section('head')
    <title>Tesell</title>
@endsection

@section("content")
<div id="app">
    <div class="menu-overlay">
        <section id="menu">
            <a class="close" href="#">
                <i class="far fa-times-circle"></i>
            </a>

            <ul>
                <li><a href="#">Model S</a></li>
                <li><a href="#">Model 3</a></li>
                <li><a href="#">Model X</a></li>
                <li><a href="#">Model Y</a></li>


                @auth
                    <li><a href="{{ route("me") }}">Account Settings</a></li>
                @endauth

                @guest
                    <li><a href="{{ route("auth") }}">Authenticate</a></li>
                @endguest
                
                <li><a href=" {{ route("cars") }} ">Shop Cars</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </section>
    </div>

    <header>
        <h1>
            <svg
                class="tds-icon tds-icon-logo-wordmark tds-site-logo-icon"
                viewBox="0 0 342 35"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    style="scale: 0.7"
                    d="M0 .1a9.7 9.7 0 007 7h11l.5.1v27.6h6.8V7.3L26 7h11a9.8 9.8 0 007-7H0zm238.6 0h-6.8v34.8H263a9.7 9.7 0 006-6.8h-30.3V0zm-52.3 6.8c3.6-1 6.6-3.8 7.4-6.9l-38.1.1v20.6h31.1v7.2h-24.4a13.6 13.6 0 00-8.7 7h39.9v-21h-31.2v-7h24zm116.2 28h6.7v-14h24.6v14h6.7v-21h-38zM85.3 7h26a9.6 9.6 0 007.1-7H78.3a9.6 9.6 0 007 7zm0 13.8h26a9.6 9.6 0 007.1-7H78.3a9.6 9.6 0 007 7zm0 14.1h26a9.6 9.6 0 007.1-7H78.3a9.6 9.6 0 007 7zM308.5 7h26a9.6 9.6 0 007-7h-40a9.6 9.6 0 007 7z"
                    fill="var(--tds-icon--fill, #171a20)"
                ></path>
            </svg>
        </h1>

        <nav>
            <ul>
                <li data-left="0" data-model="s"><a href="#">Model S</a></li>
                <li data-left="25" data-model="3"><a href="#">Model 3</a></li>
                <li data-left="50" data-model="x"><a href="#">Model X</a></li>
                <li data-left="75" data-model="y"><a href="#">Model Y</a></li>
            </ul>
            <span id="hover-sliding"></span>
        </nav>

        <nav>
            <ul>
                <li><a href=" {{ route("cars") }} ">Shop</a></li>
                <li><a href="{{ route("auth") }}">Auth</a></li>
                <li class="menu-btn__popup"><a href="#">Menu</a></li>
            </ul>
        </nav>

        <a class="menu-btn__popup" id="hamburger" href="#">Menu</a>
    </header>

    <main id="home">
        <h2>Tesell</h2>
        <h3>Premium second hand Tesla market</h3>
    </main>
</div>

<script src="{{ asset('/assets/js/main.js') }}"></script>

@endsection