@extends("layouts/master")

@section('head')
    <title>Tesell | Login</title>
@endsection

@section("content")




@include("layouts.header")

<main>

    

<section id="me">

    <h3>Welcome, {{ Auth::user() -> name }}</h3>

    @isset($errors)
    <div class="error">
        @foreach ($errors->all() as $error)
    
        <p>{{ $error }}</p>  
    
    @endforeach
    </div>
    @endisset
    

    

    <form method="POST" action="{{ route("updateMe") }}">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ Auth::user() -> name }}" required>



    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" value="{{ Auth::user() -> email }}" required>

    <input class="btn-primary" type="submit" value="Save Changes">

</form>

</section>

</main>

<script src="{{ asset("/assets/js/alert.js") }}"></script>

@isset($message)
    <script type="text/javascript">
        animateAlert("{{$message}}");
    </script>
@endisset

@endsection