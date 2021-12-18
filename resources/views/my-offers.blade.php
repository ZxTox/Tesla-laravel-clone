@extends("layouts/master")

@section('head')
    <title>Tesell | My Offers</title>
@endsection

@section("content")
@include("layouts.header")

<div id="container">

    <div class="menu-overlay center">
    <section id="edit-menu">
        <form action="#" method="POST">
            <div>

                <select name="offer" id="offer">
                    @foreach ($offers as $offer)
                        <option value="{{ $offer -> offerid }}">{{ $offer ->modelName . " "  . $offer -> typeModel }}</option>
                    @endforeach
                </select>

                <label for="price">Price</label>
                <input type="number" name="price" id="price">

                <label for="odometer">Odometer</label>
                <input type="text" name="odometer" id="odometer">

                <label for="accel">Acceleration</label>
                <input type="number" name="accel" id="accel">

                <label for="range">Range</label>
                <input type="number" name="range" id="range">

                <label for="topspeed">Top Speed</label>
                <input type="number" name="topspeed" id="topspeed">

                <input class="btn-primary" type="submit" value="Add Car">
            </div>
        </form>
    </section>
</div>

    <section id="my-offers">
        <h2>My Offers</h2>

        <div class="offers">
            @foreach ($offers as $offer)

            @if(strtotime($offer -> created_at) > strtotime('-10 days')) 
            <div class="offer new">
            @else
            <div class="offer">
            @endif

                <h3>{{ $offer -> modelName }}</h3>
                <h4>{{ $offer -> typeModel }}</h4>
                <p>€{{ number_format($offer -> price ,2,",","."); }}</p>
                <div>
                    <a href="{{ route("car", $offer -> offerid) }}">
                        <button class="btn-secondary">
                            View Offer
                        </button>  
                        </a>

                    <a href="{{ route("car", $offer -> offerid) }}">
                    <a href="{{ route("markAsSold", $offer -> offerid) }}" class="btn-primary">
                        Mark as Sold
                    </a>  
                    </a>
                </div>
                
                
            </div>
        @endforeach
        </div>
        
    </section>
</div>



<div id="car-graph">
    <canvas></canvas>
    <canvas></canvas>
</div>

<script src="{{ asset("assets/js/alert.js") }}"></script>
<script src="{{ asset('assets/js/chart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@if(session()->has('message'))
    <script type="text/javascript">
        animateAlert("{{session()->get('message')}}");
    </script>
@endif
@endsection