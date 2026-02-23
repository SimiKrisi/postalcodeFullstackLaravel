<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postal Codes</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<body>
    <header>
        <img src="{{ asset('logo.png') }}" alt="Logo" >
        <nav>
            <ul>
                <li><a href="{{route('export.index')}}">Export</a></li>
                <li><a href="{{route('counties.index')}}">Counties</a></li>
                <li><a href="{{route('postalcodes.index')}}">Postal Codes</a></li>
                @guest
                    <li><a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a></li>
                    <li><a href="{{ route('register') }}" class="btn btn-primary">Register</a></li>
                @endguest
                @auth
                    
                    <li><form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Kijelentkezés</button>
                    </form></li>
                @endauth
            </ul>
        </nav> 
    </header>
    <main>
        @yield('content')  
        
    </main>
    <footer>    
        <p>&copy; 2026 Postal Codes Application</p>
    </footer>
</body>
</html>