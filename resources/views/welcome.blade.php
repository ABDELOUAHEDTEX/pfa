<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        /* Your custom styles here */
        body {
            font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            background-color: #F3F4F6; /* Light gray background */
            color: #1F2937; /* Dark gray text */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            text-align: center;
        }
        .btn {
            display: inline-block;
            margin: 0.5rem;
            padding: 1rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
            background-color: #FF2D20; /* Red button */
            border-radius: 9999px; /* Rounded corners */
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #E11D10; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome </h1>
        <p>Please login or register to continue</p>
        <div class="btn-container">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
