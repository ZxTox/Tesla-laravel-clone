@extends("layouts.master")

@section('head')
    <title>Tesell | Login</title>
@endsection

@section("content")

@extends("layouts.header")

<section class="credentials__form" id="login">

    <h3>Sign In</h3>
    <h3 class="hidden">Sign Up</h3>
    
    
    @include("layouts.error")

            
        <form id="login-form" method="POST" action="{{ route('login') }}">
            @csrf
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <input class="btn-primary" type="submit" value="Sign In">
            </form>

            <form id="register-form" class="hidden" method="POST" action="{{ route('register') }}">
                @csrf

                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>

                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" required>
    
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>

                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
    
                    <input class="btn btn-primary" type="submit" value="Register">
                </form>

            <a href="{{ route("password.request") }}">Forgot password?</a>

            <span>OR</span>


            <button id="register-btn" class="btn btn-secondary">Create Account</button>
            <button id="login-btn" class="btn btn-secondary hidden">Login</button>

</section>

<script src="{{ asset('/assets/js/login.js') }}"></script>

@endsection