@extends("layouts/master")

@section('head')
    <title>Tesell | Login</title>
@endsection

@section("content")
<header>
    <h1>
        <svg
            class="tds-icon tds-icon-logo-wordmark tds-site-logo-icon"
            viewBox="0 0 342 35"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                style="scale: 0.7"
                d="M0 .1a9.7 9.7 0 007 7h11l.5.1v27.6h6.8V7.3L26 7h11a9.8 9.8 0 007-7H0zm238.6 0h-6.8v34.8H263a9.7 9.7 0 006-6.8h-30.3V0zm-52.3 6.8c3.6-1 6.6-3.8 7.4-6.9l-38.1.1v20.6h31.1v7.2h-24.4a13.6 13.6 0 00-8.7 7h39.9v-21h-31.2v-7h24zm116.2 28h6.7v-14h24.6v14h6.7v-21h-38zM85.3 7h26a9.6 9.6 0 007.1-7H78.3a9.6 9.6 0 007 7zm0 13.8h26a9.6 9.6 0 007.1-7H78.3a9.6 9.6 0 007 7zm0 14.1h26a9.6 9.6 0 007.1-7H78.3a9.6 9.6 0 007 7zM308.5 7h26a9.6 9.6 0 007-7h-40a9.6 9.6 0 007 7z"
                fill="var(--tds-icon--fill, #171a20)"
            ></path>
        </svg>
    </h1>

    <a class="menu-btn__popup" id="hamburger" href="#">Menu</a>
</header>
<section id="login">

    <h3>Sign In</h3>
    <h3 class="hidden">Sign Up</h3>
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>  
    @endforeach

            
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

                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" required>
    
                    <input class="btn-primary" type="submit" value="Register">
                </form>

            <a href="#">Forgot password?</a>

            <span>OR</span>


            <button id="register-btn" class="btn-secondary">Create Account</button>
            <button id="login-btn" class="btn-secondary hidden">Login</button>

</section>

<script src="{{ asset('/assets/js/login.js') }}"></script>

@endsection