@extends("layouts/master")

@section('head')
    <title>Tesell - Premium Second Hand Tesla Market</title>

    <meta name="title" content="Tesell - Premium Second Hand Tesla Market">
    <meta name="description" content="Sell your Tesla car on the best market available. Don't wait and sell now!">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://tesell.com">
    <meta property="og:title" content="Tesell - Premium Second Hand Tesla Market">
    <meta property="og:description" content="Sell your Tesla car on the best market available. Don't wait and sell now!">
    <meta property="og:image" content="{{ asset("assets/images/cover-img.jpg") }}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://tesell.com">
    <meta property="twitter:title" content="Tesell - Premium Second Hand Tesla Market">
    <meta property="twitter:description" content="Sell your Tesla car on the best market available. Don't wait and sell now!">
    <meta property="twitter:image" content="{{ asset("assets/images/cover-img.jpg") }}">

@endsection

@section("content")
<div id="app">
    @include("layouts.header")

    <main id="home">
        <h2>Tesell</h2>
        <h3>Premium second hand Tesla market</h3>
    </main>
</div>


@endsection