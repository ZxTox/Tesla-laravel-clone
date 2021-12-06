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
                
            </div>
        </section>
    </main>
</div>

<script src="{{ asset('/assets/js/cars.js') }}"></script>
@endsection