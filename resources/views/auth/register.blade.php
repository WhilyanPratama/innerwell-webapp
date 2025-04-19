<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <div>
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required>
        </div>
        <div>
            <label>No Telp</label>
            <input type="text" name="no_telp" required>
        </div>
        <div>
            <label>NIK</label>
            <input type="text" name="nik" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" required>
        </div>
        <div>
            <label>Alamat</label>
            <textarea name="alamat" required></textarea>
        </div>
        <div>
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
        <div>
            <label>Golongan Darah</label>
            <input type="text" name="golongan_darah">
        </div>
        <div>
            <label>Alergi</label>
            <textarea name="alergi"></textarea>
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>
