@extends("layouts/master")

@section('head')
    <title>Tesell | {{ explode(" ", Auth::user() -> name)[0] }}'s profile</title>
@endsection

@section("content")
@include("layouts.header")


<section id="admin-dashboard">
    <h2>Admin dashboard</h2>


    <div>
        <canvas id="users-chart"></canvas>
    </div>

    <div>
        <canvas id="amount-of-cars-chart"></canvas>
    </div>
</section>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset("assets/js/dashboard.js") }}"></script>


@endsection