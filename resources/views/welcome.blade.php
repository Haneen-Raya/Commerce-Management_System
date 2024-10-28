<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Our Online Store</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Montserrat:400,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(to right, #f5f7fa, #e1e9d3);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
            position: relative;
            z-index: 1;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #6c757d;
        }
        p {
            margin-bottom: 2rem;
            color: #555;
        }
        .btn-custom {
            margin: 1rem;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            font-size: 1.2rem;
        }
        .btn-login {
            background-color: #d8b27b;
            color: #ffffff;
        }
        .btn-login:hover {
            background-color: #c59c5a;
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-register {
            background-color: #b6a26e;
            color: #ffffff;
        }
        .btn-register:hover {
            background-color: #a58b5b;
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-custom i {
            margin-right: 0.5rem;
        }
        .social-icons {
            margin-top: 2rem;
        }
        .social-icons a {
            margin: 0 10px;
            color: #6c757d;
            font-size: 1.5rem;
        }
        /* Decorative Elements */
        .decorative-shape {
            position: absolute;
            width: 100px;
            height: 100px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            z-index: 0;
        }
        .shape1 { top: -50px; left: -50px; }
        .shape2 { bottom: -50px; right: -50px; }
        .shape3 { top: -50px; right: -50px; }
        .shape4 { bottom: -50px; left: -50px; }
    </style>
</head>
<body>
    <div class="decorative-shape shape1"></div>
    <div class="decorative-shape shape2"></div>
    <div class="decorative-shape shape3"></div>
    <div class="decorative-shape shape4"></div>

    <div class="container">
        <h1>Welcome to Our Online Store</h1>
        <p>Your one-stop shop for the best products.</p>
        <a href="{{ route('login') }}" class="btn btn-custom btn-login">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
        <a href="{{ route('register') }}" class="btn btn-custom btn-register">
            <i class="fas fa-user-plus"></i> Register
        </a>
        <div class="social-icons">
        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</body>
</html>
