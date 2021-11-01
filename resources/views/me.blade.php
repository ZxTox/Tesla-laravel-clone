@extends("layouts/master")

@section('head')
    <title>Tesell | Login</title>
@endsection

@section("content")




@include("layouts.header")


<section class="credentials__form" id="me">

    <h3>Welcome, {{ Auth::user() -> name }}</h3>


    <div class="profile-tab">
        <a href="#">Profile</a>
        <a href="#">Password</a>
    </div>



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
    

    <form method="POST" action="{{ route("updateMe") }}">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ Auth::user() -> name }}" required>

    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" value="{{ Auth::user() -> email }}" required>

    <input class="btn-primary" type="submit" value="Save Changes">

</form>

</section>


<script src="{{ asset("/assets/js/alert.js") }}"></script>

@isset($message)
    <script type="text/javascript">
        animateAlert("{{$message}}");
    </script>
@endisset
@endsection