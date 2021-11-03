@extends("layouts/master")

@section('head')
    <title>Tesell | {{ explode(" ",Auth::user() -> name)[0] }}'s profile</title>
@endsection

@section("content")




@include("layouts.header")


<section class="credentials__form" id="me">

    <h3>Welcome, {{ Auth::user() -> name }}</h3>


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


    <div class="profile-tab">
        <a data-form="me-credentials" href="#">Profile</a>
        <a data-form="me-password" href="#">Password</a>
    </div>

    
    <form method="POST" action="{{ route("uploadMe") }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload">
    </form>
    

    <form id="me-credentials" method="POST" action="{{ route("updateMe") }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ Auth::user() -> name }}" required>

        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" value="{{ Auth::user() -> email }}" required>

        <input class="btn-primary" type="submit" value="Save Changes">
    </form>

    <form id="me-password" class="hidden" method="POST" action="{{ route("updateMe") }}">
        @csrf

        <label for="password_old">Old Password</label>
        <input type="password" name="password_old" id="password_old" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>

        <input class="btn-primary" type="submit" value="Apply Password">
    </form>

</section>


<script src="{{ asset("/assets/js/alert.js") }}"></script>
<script src="{{ asset("/assets/js/me.js") }}"></script>

@if(session()->has('message'))
    <script type="text/javascript">
        animateAlert("{{session()->get('message')}}");
    </script>
@endif
@endsection