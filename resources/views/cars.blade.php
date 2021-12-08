@extends("layouts/master")

@section('head')
    <title>Tesell | Cars</title>
@endsection

@section("content")


@include("layouts.header")


<div id="container">
    <main>
        <section id="cars">
            <div class="filters">
                <h2>Inventory</h2>
                <button>Model S</button>
                <button>Model 3</button>
                <button>Model X</button>
                <button>Model Y</button>
            </div>
            <div class="car-inventory">
                
                <!-- LOADED VIA JS -->

                @foreach ($cars as $car)
                <div class="car">
                    <a href="/cars/${currentCar.offerid}">
                        <h3>{{ $car -> year }} {{ $car -> modelName }}</h3>
                    </a>
                        <h4>{{ $car -> typeModel }}</h4>
                    <h5>€{{ number_format($car -> price, 2) }}</h5>
                    <img
                        src="{{ json_decode($car -> images)[0] }}"
                        alt="picture of a {{ $car -> modelName }}"
                    />
            
                    <ul class="car-specs">
                        <div class="car-cta">
                        <a href="{{ route("car", $car -> offerid) }}">
                            <button class="btn-primary">Contact buyer</button>
                        </a>
                        <a href="{{ route("car", $car -> offerid) }}">
                            <button class="btn-secondary">View Details</button>
                        </a>
                        </div>
                        <li>
                            <h5>{{ $car -> accel }}<span>s</span></h5>
                            <p>0-100 kph</p>
                        </li>
            
                        <li><div class="vertial-line"></div></li>
            
                        <li>
                            <h5>{{ $car -> topSpeed }}<span>kph</span></h5>
                            <p>Top speed</p>
                        </li>
            
                        <li><div class="vertial-line"></div></li>
            
                        <li>
                            <h5>{{ $car -> range }}<span>km</span></h5>
                            <p>range (EPA)</p>
                        </li>
                    </ul>
                </div>
                @endforeach

                
                
            </div>
        </section>
    </main>
</div>

<!-- <script src="{{ asset('/assets/js/cars.js') }}"></script> -->
@endsection