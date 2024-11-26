@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
</head>
<body>
    <div class="container">
        <form action="" class="form-signup">
            <h2>Create an Account</h2>

            <div class= "form-group">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="firstname" placeholder="Enter your first name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="lasttname" placeholder="Enter your last name">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email address">
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="repassword" name="confirm_password" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <label for="">
                    <input type="checkbox" name="">
                    I accept the <a href="#">Terms of use</a> & <a href="#">Privacy Policy</a>
                </label>
            </div>

            <input type="submit" class="btn btn-success btn-block" name="" value="Submit">
        </form>

    </div>
</body>
</html>
@endsection
