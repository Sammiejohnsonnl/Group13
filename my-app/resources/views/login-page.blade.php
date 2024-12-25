<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 30px;
        }

        .input-field {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border-radius: 25px; 
            border: 1px solid #ddd;
            font-size: 16px;
            box-sizing: border-box; 
        }

        .input-field:focus {
            outline: none;
            border-color: #4a90e2;
        }

        .password-container {
            width: 100%;
            position: relative;
            margin-bottom: 20px; 
        }

        .password-container input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border-radius: 25px; 
            border: 1px solid #ddd;
            font-size: 16px;
            box-sizing: border-box; 
        }

        .password-container button {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%); 
            background: none;
            border: none;
            font-size: 16px;
            color: #4a90e2;
            cursor: pointer;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #001432;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #4a90e2;
        }

        .footer-links {
            text-align: center;
            margin-top: 20px;
        }

        .footer-links a {
            font-size: 14px;
            color: #4a90e2;
            text-decoration: none;
            margin: 0 5px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Account Sign In</h2>

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Username or Email -->
            <input type="text" class="input-field" placeholder="Email" name="username" required>

            <!-- Password with Show Password toggle -->
            <div class="password-container">
                <input type="password" class="input-field" placeholder="Password" name="password" id="password" required>
                <button type="button" id="toggle-password">Show</button>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="login-btn">Sign in</button>
        </form>

        <!-- Footer Links -->
        <div class="footer-links">
            <a href="#">Forgot Password?</a> | 
            <a href="#">Sign Up</a>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const togglePasswordButton = document.getElementById('toggle-password');
        const passwordField = document.getElementById('password');
        
        togglePasswordButton.addEventListener('click', function () {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            togglePasswordButton.textContent = type === 'password' ? 'Show' : 'Hide';
        });
    </script>
</body>
</html>
