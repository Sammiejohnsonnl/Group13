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
        </form>

    </div>
</body>
</html>
@endsection
