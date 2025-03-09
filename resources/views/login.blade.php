<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 380px;
            transition: transform 0.3s ease-in-out;
        }

        .container:hover {
            transform: scale(1.05);
        }

        h2 {
            color: #00796b;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .social-login {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 20px;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            color: white;
            text-decoration: none;
            width: 100%;
            transition: transform 0.2s ease;
        }

        .google-btn {
            background: #db4437;
        }

        .facebook-btn {
            background: #3b5998;
        }

        .social-btn:hover {
            transform: scale(1.05);
        }

        .social-btn img {
            width: 20px;
            height: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        input:focus {
            border: 1px solid #00796b;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #00796b;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: #004d40;
            transform: scale(1.05);
        }

        #loginMessage {
            margin-top: 10px;
            font-weight: bold;
            color: red;
        }

        a {
            color: #00796b;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <div class="social-login">
        <a href="{{ route('social.redirect', 'google') }}" class="social-btn google-btn">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" alt="Google Logo">
            Login with Google
        </a>
        <a href="{{ route('social.redirect', 'facebook') }}" class="social-btn facebook-btn">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook Logo">
            Login with Facebook
        </a>
    </div>

    <form id="loginForm">
        @csrf
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <p id="loginMessage"></p>
    <p><a href="{{ route('register.page') }}">Register</a></p>
</div>

<script>
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        $.post("{{ route('ajax.login') }}", $(this).serialize(), function(response) {
            alert(response.message);
            window.location.href = response.redirect;
        }).fail(function(xhr) {
            $('#loginMessage').text(xhr.responseJSON.message).css('color', 'red');
        });
    });
</script>

</body>
</html>
