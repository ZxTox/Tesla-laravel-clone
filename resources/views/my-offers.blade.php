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

@endsection