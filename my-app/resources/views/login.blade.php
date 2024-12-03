@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <body class="reg-body">
        <section class="reg-container">

            <header> 
                <h1 class="reg-header">Welcome Back</h1> 
            </header>

            <form action="#" class="form">

                <div class="input-box">
                    <label>Email address</label>
                    <input type="email" placeholder="Enter your email address" required />
                </div>

                <div class="input-box">
                    <label>Password</label>
                    <input type="password" placeholder="Password" required />
                </div>


                <button class="sign-btn">Sign in</button>

                <div  class="paragraph">
                    <p>Don't have an account?<a href="#"> Sign Up </a></p>
                </div>

            </form>

        </section>

    </body>

</html>
@endsection
