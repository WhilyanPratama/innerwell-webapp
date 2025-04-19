<!DOCTYPE html>
<html>
<head>
    <title>Dokter Dashboard</title>
</head>
<body>
    <h1>Dokter Dashboard</h1>
    <p>Welcome, {{ auth()->user()->nama_lengkap }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <table border="1">
        <tr>
            <th>Menu Dokter</th>
        </tr>
        <tr>
            <td>Manage Users</td>
        </tr>
        <tr>
            <td>Manage Roles</td>
        </tr>
    </table>
</body>
</html>
