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
                <li><a href="{{route('counties.index')}}">Counties</a></li>
                <li><a href="{{route('counties.create')}}">Create County</a></li>
                
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