@extends("layouts/master")

@section('head')
    <title>Tesell | {{ explode(" ", Auth::user() -> name)[0] }}'s profile</title>
@endsection

@section("content")
@include("layouts.header")


<section id="admin-dashboard">
    <h2>Admin dashboard</h2>
</section>





<script src="{{ asset("assets/js/alert.js") }}"></script>


@if(session()->has('message'))
    <script type="text/javascript">
        animateAlert("{{session()->get('message')}}");
    </script>
@endif
@endsection