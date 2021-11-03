@extends("layouts/master")

@section('head')
    <title>Tesell | {{ explode(" ",Auth::user() -> name)[0] }}'s profile</title>
@endsection

@section("content")




@include("layouts.header")


<section class="credentials__form" id="add-offer">

    <h3>Add a car</h3>


    @if(count($errors->all()) > 0)
    <div class="error">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM4 12.172C4.04732 16.5732 7.64111 20.1095 12.0425 20.086C16.444 20.0622 19.9995 16.4875 19.9995 12.086C19.9995 7.68451 16.444 4.10977 12.0425 4.086C7.64111 4.06246 4.04732 7.59876 4 12V12.172ZM14 17H11V13H10V11H13V15H14V17ZM13 9H11V7H13V9Z" fill="white"/>
            </svg>
        @foreach ($errors->all() as $error)
    
        <p>{{ $error }}</p>  
    
    @endforeach
    </div>
    @endif

    <form action="#">
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
                <input type="checkbox" id="feature-{{ $feature -> id }}" name="features" value="{{ $feature -> id }}">
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

        <label for="image-1">Image</label>
        <input type="file" name="carimages" id="carimages" multiple>

        <p id="files"></p>


        <div class="files">
           
        </div>
    </form>

    
</section>

<script src="{{ asset("assets/js/add-car.js") }}"></script>

@endsection




