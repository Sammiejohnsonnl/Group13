@extends('layouts.app')

@section('content')

    <title>Sign-Up</title>
    
    <header> 
        <div class="header-icons"><a href="{{ route('notification') }}"><i class="fa-regular fa-bell"></i></a>
            <i class="fa-regular fa-user header-icons"></i>
        </div>
    </header>

    <body>
        <div class="reg-body">


            <section class="reg-container">

                <h1 class="reg-header">Become a Member Today</h1>

                <form method="POST" action="{{ route('userSignUp') }}" class="form">

                    @csrf

                    <div class="input-box">
                        <label>First name</label>
                        <input type="text" name="firstName" placeholder="Enter your first name" required />
                    </div>

                    <div class="input-box">
                        <label>Last Name</label>
                        <input type="text" name="lastName" placeholder="Enter your last name" required />
                    </div>

                    <div class="input-box">
                        <label>Email address</label>
                        <input type="email" name="email" placeholder="Enter your email address" required />
                    </div>

                    <div class="input-box">
                        <label>Phone Number</label>
                        <input type="number" name="number" placeholder="Enter phone number" required />
                    </div>

                    <div class="input-box">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required />
                    </div>

                    <div class="input-box">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmPassword" placeholder="Confirm Password" required />
                    </div>

                    <div class="checkbox">
                        <label for="">
                            <input type="checkbox" name="">
                            I accept the <a href="#">Terms of use</a> & <a href="#">Privacy Policy</a>
                        </label>
                    </div>


                    <button class="sign-btn">Sign Up</button>

                    <div  class="paragraph">
                        <p>Already a member?<a href="{{ route('user.login') }}"> Sign in </a></p>
                    </div>


                </form>

            </section>
        </div>
    </body>


@endsection
