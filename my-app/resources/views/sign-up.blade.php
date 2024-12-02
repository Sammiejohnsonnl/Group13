@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <body class="reg-body">
        <section class="reg-container">

            <header> 
                <h1 class="reg-header">Become a Member Today</h1> 
            </header>

            <form action="#" class="form">

                <div class="input-box">
                    <label>First name</label>
                    <input type="text" placeholder="Enter your first name" required />
                </div>

                <div class="input-box">
                    <label>Last Name</label>
                    <input type="text" placeholder="Enter your last name" required />
                </div>

                <div class="input-box">
                    <label>Email address</label>
                    <input type="email" placeholder="Enter your email address" required />
                </div>

                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="number" placeholder="Enter phone number" required />
                </div>

                <div class="input-box">
                    <label>Password</label>
                    <input type="password" placeholder="Password" required />
                </div>

                <div class="input-box">
                    <label>Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" required />
                </div>

                <div class="checkbox">
                    <label for="">
                        <input type="checkbox" name="">
                        I accept the <a href="#">Terms of use</a> & <a href="#">Privacy Policy</a>
                    </label>
                </div>


                <button class="sign-btn">Sign Up</button>

            </form>

        </section>

    </body>

</html>
@endsection
