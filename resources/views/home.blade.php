<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Klinik</title>
</head>
<body>
    <h1>Welcome to Klinik</h1>
    @auth
        <p>You are logged in as {{ auth()->user()->nama_lengkap }} ({{ auth()->user()->role }})</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endauth
</body>
</html>
