<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background: linear-gradient(110deg, #0f0c29, #343063, #24243e);
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 10px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .logout-button {
            background: none;
            border: none;
            color: #f55;
            font-weight: bold;
            cursor: pointer;
}
        @media (max-width: 376px) {
            nav ul li {
                display: block;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                @auth
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ url('/') }}">Home</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('signup') }}">Register</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
</body>
</html>
