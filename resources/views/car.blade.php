@extends("layouts.master")

@section('head')
    <title>Tesell | {{ $car -> year}} {{ $car -> modelName }}</title>
    @include("layouts.mapboxCDN")
@endsection

@section("content")

<div id="car">

    <section id="car-media">

        @include("layouts.header")

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
            <li><p>Located in Zaventem</p></li>
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

<script>
    const locations = [
            {
                "description": "{{ Auth::user() -> name }}",
                "coordinates": JSON.parse("{{ Auth::user() -> location }}"),
                "location": "Test"
            }
        ]

    loadMap(locations);
</script>
@endsection
