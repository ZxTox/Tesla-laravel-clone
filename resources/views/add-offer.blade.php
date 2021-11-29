@extends("layouts/master")

@section('head')
    <title>Tesell | {{ explode(" ",Auth::user() -> name)[0] }}'s profile</title>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
@endsection

@section("content")

@include("layouts.header")


<section class="credentials__form" id="add-offer">

    <h3>Add a car</h3>


    @include("layouts.error")

    <form method="POST" action="{{ route("addCar") }}" enctype="multipart/form-data">
        @csrf

        <label for="model">Model</label>
        <select name="model" id="model">
            <option value="Model S">Model S</option>
            <option value="Model 3">Model 3</option>
            <option value="Model X">Model X</option>
            <option value="Model Y">Model Y</option>
        </select>

        <label for="type">Type</label>
        <input type="text" name="type" id="type">

        <label for="year">Year</label>
        <input type="number" name="year" id="year">

        <fieldset>
            @foreach ($features as $feature)
            <div>
                <input type="checkbox" id="feature-{{ $feature -> id }}" name="features[]" value="{{ $feature -> id }}">
                <label class="checkbox-label" for="feature-{{ $feature -> id }}">{{ $feature -> feature_name }}</label>
            </div>
            @endforeach
        </fieldset>


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

        <label for="carimages">Image</label>
        <input type="file" name="carimages[]" id="carimages" multiple>
        

        <div class="files">
           
        </div>

        <input class="btn-primary" type="submit" value="Add Car">
    </form>

    
</section>



<script src="{{ asset("assets/js/add-car.js") }}"></script>
<script src="{{ asset('assets/js/mapbox.js') }}"></script>


</script>
@endsection




