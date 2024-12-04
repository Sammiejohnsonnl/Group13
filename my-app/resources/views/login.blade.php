@extends('layouts.app')

@section('content')

    <title>Login</title>
    <body>
        <div class="reg-body">

            <section class="reg-container">

                
                <h1 class="reg-header">Welcome Back</h1> 
                

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
                        <p>Don't have an account?<a href="{{ route('user.signup') }}"> Sign Up </a></p>
                    </div>

                </form>

            </section>
        </div>
    </body>


@endsection
