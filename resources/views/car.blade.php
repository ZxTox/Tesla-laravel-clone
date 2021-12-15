@extends("layouts.master")

@section('head')
    <title>Tesell | {{ $car -> year}} {{ $car -> modelName }}</title>

    <meta name="description" content="Tesell - {{ $car -> year }} {{ $car -> modelName }} on sale">


    @include("layouts.mapboxCDN")
@endsection

@section("content")


<div class="overlay">
<section id="contact-seller">

    <svg class="close-icon" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
        <g stroke="#171a20" stroke-width="1.5" stroke-linecap="round"><line x1="10" y1="10" x2="20" y2="20"></line><line x1="20" y1="10" x2="10" y2="20"></line></g>
    </svg>


    <h3>Seller details</h3>
    <p>Date of creation: {{ $car -> created_at->isoformat("DD-MM-YYYY") }}</p>
        <figure>
            <img src="{{ $car -> photoUrl }}" alt="{{ $car -> name }}'s' profile picture">
        <figcaption>
              {{ $car -> name }}
            </figcaption>
        </figure>
    
    <a class="btn btn-primary" href="mailto: {{ $car -> email }}">{{ $car -> email }}</a>
</section>
</div>


<div id="car">

    <section id="car-media">

        <header>

            <a href="{{ route("index") }}">
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
        </a>
        
            <a class="menu-btn__popup" id="hamburger" href="#">Menu</a>
        </header>
        



        <div class="car-images">
            <a class="img-arrows invinsible" href="#" data-type="0">
                <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="24" fill="#C4C4C4"/>
                    <path d="M19.8757 33.8992L29.7749 24L19.8757 14.1008L18.2249 15.7505L26.4756 24L18.2249 32.2495L19.8757 33.8992Z" fill="#404040"/>
                    </svg>
            </a>


            <a class="img-arrows invinsible" href="#" data-type="1">
                <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="24" transform="rotate(-180 24 24)" fill="#C4C4C4"/>
                    <path d="M28.1243 14.1008L18.2251 24L28.1243 33.8992L29.7751 32.2495L21.5244 24L29.7751 15.7505L28.1243 14.1008Z" fill="#404040"/>
                    </svg>
            </a>
        <img
            src="{{ json_decode($car -> images)[0] }}"
            data-images="{{ join(" ", json_decode($car -> images))  }}"
            alt="{{ $car -> modelName }}"
            loading="lazy"
        />
    </div>

    </section>

    <section id="car-information">


        <div id="scroll-down">
            <svg width="32" height="20" viewBox="0 0 32 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.444092 3.51918L15.9999 19.075L31.5558 3.51918L28.9634 0.925015L15.9999 13.8903L3.03642 0.925015L0.444092 3.51918Z" fill="#404040"/>
            </svg>
        </div>




        <h3>{{ $car -> year }} {{ $car -> modelName }} {{ explode(" ", $car -> typeModel)[0] }}</h3>
        <h4>{{ $car -> typeModel }}</h4>


        <ul class="car-specs">

            <li>
                <h5>{{ $car -> range }}<span>km</span></h5>
                <p>Range</p>
                <p>(EPA est.)</p>
            </li>

            <li>
                <h5>{{ $car -> topSpeed }}<span>kph</span></h5>
                <p>Top speed</p>
            </li>

            <li>
                <h5>{{ $car -> accel }}<span>s</span></h5>
                <p>0-100 kph</p>
            </li>
        </ul>

        <ul>
            <li><p>Used Vehicule</p></li>
            <li><p>{{ number_format($car -> odometer) }} km odometer</p></li>
            <li><p>White Color</p></li>
            <li><p id="place-name">Located in Zaventem</p></li>
        </ul>


        <h3>Key Features</h3>

        <ul id="car-features">
            @foreach ($features as $item)
                <li><p>{{ $item -> feature_name }}</p></li>
            @endforeach
        </ul>

        

        <h3>Seller details</h3>
        <figure>
            <a href="#">
                <img src="{{ $car -> photoUrl }}" alt="{{ $car -> name }}'s' profile picture">
            </a>
            <figcaption>
              {{ $car -> name }}
            </figcaption>
        </figure>


          <button class="btn btn-primary">Contact Seller</button>



          <div id="map"></div>
    </section>


</div>

<script src="{{ asset("assets/js/mapbox.js") }}"></script>
<script src="{{ asset("assets/js/car.js") }}"></script>

@if(!is_null($car -> location))
<script>
    const locations = [
            {
                "description": "{{ $car -> name }}",
                "coordinates": JSON.parse("{{ $car-> location }}"),
                "location": "Location"
            }
        ]

    loadMapWithAddress(locations, "#place-name");
</script>
@endif


@endsection
