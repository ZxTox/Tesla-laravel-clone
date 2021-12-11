<div class="menu-overlay">
    <section id="menu">
        <a class="close" href="#">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="20" cy="20" rx="20" ry="20" transform="rotate(-180 20 20)" fill="black"/>
                <path d="M25.59 13L20 18.59L14.41 13L13 14.41L18.59 20L13 25.59L14.41 27L20 21.41L25.59 27L27 25.59L21.41 20L27 14.41L25.59 13Z" fill="white"/>
            </svg>
        </a>

        <ul>
            <li><a href="{{ route("cars") }}?model=Model S">Model S</a></li>
            <li><a href="{{ route("cars") }}?model=Model 3">Model 3</a></li>
            <li><a href="{{ route("cars") }}?model=Model X">Model X</a></li>
            <li><a href="{{ route("cars") }}?model=Model Y">Model Y</a></li>


            @auth
                <li><a href="{{ route("me") }}">Account Settings</a></li>

                <li><a href="{{ route("addCarForm") }}">Add car</a></li>
                <li><a href="{{ route("myoffers") }}">My car offers</a></li>
            @endauth

            @guest
                <li><a href="{{ route("auth") }}">Authenticate</a></li>
            @endguest
            
            <li><a href=" {{ route("cars") }} ">Shop Cars</a></li>
            <li><a href="#">About Us</a></li>

            @if (Auth::user() -> role == "admin")
                <li><a href="{{ route('admin') }}">Admin dashboard</a></li>
            @endif
        </ul>
    </section>
</div>

<header>
    <h1>
        <a href="{{ route("index") }}">
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
        </a>
    </h1>

    <nav>
        <ul>
            <li data-left="0" data-model="s"><a href="{{ route("cars") }}?model=Model S">Model S</a></li>
            <li data-left="25" data-model="3"><a href="{{ route("cars") }}?model=Model 3">Model 3</a></li>
            <li data-left="50" data-model="x"><a href="{{ route("cars") }}?model=Model X">Model X</a></li>
            <li data-left="75" data-model="y"><a href="{{ route("cars") }}?model=Model Y">Model Y</a></li>
        </ul>
        <span id="hover-sliding"></span>
    </nav>

    <nav>
        <ul>
            <li><a href="{{ route("cars") }}">Shop</a></li>
            <li><a href="{{ route("auth") }}">Auth</a></li>
            <li class="menu-btn__popup"><a href="#">Menu</a></li>
        </ul>
    </nav>

    <a class="menu-btn__popup" id="hamburger" href="#">Menu</a>
</header>