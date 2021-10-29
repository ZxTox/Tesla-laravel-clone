@extends("layouts/master")

@section('head')
    <title>Tesell | Login</title>
@endsection

@section("content")
<section id="login">

    <h3>Sign In</h3>
            
            <form action="#">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" id="password">

                <input class="btn-primary" type="submit" value="Sign In">
            </form>

            <a href="#">Forgot password?</a>

            <span>OR</span>


            <button class="btn-secondary">Create Account</button>

</section>

@endsection