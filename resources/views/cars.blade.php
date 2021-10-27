@extends("layouts/master")

@section('head')
    <title>Tesell | Cars</title>
@endsection

@section("content")
<div id="container">
    <aside>
        <h2>Inventory</h2>
    </aside>
    <main>
        <section id="cars">
            <div class="car-inventory">
                
                <!-- LOADED VIA JS -->
                
            </div>
        </section>
    </main>
</div>

<script src="{{ asset('/assets/js/cars.js') }}"></script>
@endsection