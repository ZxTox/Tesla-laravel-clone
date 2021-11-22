@extends("layouts/master")

@section('head')
    <title>Tesell | My Offers</title>
@endsection

@section("content")
@include("layouts.header")

<div id="container">
    

    <section id="my-offers">
        <h2>My Offers</h2>

        <div class="offers">
            @foreach ($offers as $offer)
            <div class="offer">

                <h3>{{ $offer -> modelName }}</h3>
                <h4>{{ $offer -> typeModel }}</h4>
                <a class="btn-primary" href="{{ route("car", $offer -> offerid) }}">
                    View Offer
                </a>
                
            </div>
        @endforeach
        </div>
        
    </section>
</div>



<div id="car-graph">
    <canvas></canvas>
    <canvas></canvas>
</div>

<script src="{{ asset('assets/js/chart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection