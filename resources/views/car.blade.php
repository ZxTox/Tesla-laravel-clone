@extends("layouts/master")

@section('head')
    <title>Tesell | {{ $car -> year}} {{ $car -> name }}</title>
@endsection

@section("content")


@extends("layouts.header")

<div id="container">
  
</div>

<script src="{{ asset('/assets/js/cars.js') }}"></script>
@endsection