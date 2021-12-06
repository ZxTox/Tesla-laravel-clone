@extends("layouts/master")

@section('head')
    <title>Tesell | My Offers</title>
@endsection

@section("content")
@include("layouts.header")

<div id="container">

    <div class="menu-overlay">
    <section id="edit-menu">
        
    </section>
</div>

    <section id="my-offers">
        <h2>My Offers</h2>

        <div class="offers">
            @foreach ($offers as $offer)
            <div class="offer">

                <h3>{{ $offer -> modelName }}</h3>
                <h4>{{ $offer -> typeModel }}</h4>
                <p>{{ $offer -> price }}</p>
                <div>
                    <a href="{{ route("car", $offer -> offerid) }}">
                        <button class="btn-secondary">
                            View Offer
                        </button>  
                        </a>

                    <a href="{{ route("car", $offer -> offerid) }}">
                    <button class="btn-primary">
                        Edit Offer
                    </button>  
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

<script src="{{ asset('assets/js/chart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection