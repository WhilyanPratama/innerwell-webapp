<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        ::placeholder {
            color: #a0aec0;
            opacity: 1;
        }
        :-ms-input-placeholder {
           color: #a0aec0;
        }
        ::-ms-input-placeholder {
           color: #a0aec0;
        }
        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        input[type="date"]::-webkit-calendar-picker-indicator {
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">

    <div class="bg-white p-8 md:p-12 rounded-lg shadow-md w-full max-w-4xl">
        <h1 class="text-3xl md:text-4xl font-bold mb-2 text-gray-900">Sign Up</h1>

        <p class="text-gray-600 mb-1">Mohon Sign Up untuk melanjutkan</p>
        <p class="text-sm text-gray-500 mb-8">Buat akun pasien untuk mengakses layanan kesehatan kami.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">

                <div>
                    <div class="mb-4">
                        <input
                            type="text"
                            name="nama_lengkap"
                            id="nama_lengkap"
                            placeholder="Nama Lengkap"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                            value="{{ old('nama_lengkap') }}"
                        >
                        @error('nama_lengkap')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input
                            type="text"
                            name="nik"
                            id="nik"
                            placeholder="NIK"
                            required
                            pattern="\d{16}"
                            title="NIK must be 16 digits"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                            value="{{ old('nik') }}"
                        >
                        @error('nik')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input
                            type="tel"
                            name="no_telp"
                            id="no_telp"
                            placeholder="No Telp"
                            required
                            pattern="[0-9\s\-+]*"
                            title="Please enter a valid phone number"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                            value="{{ old('no_telp') }}"
                        >
                        @error('no_telp')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="Email"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <select
                            name="jenis_kelamin"
                            id="jenis_kelamin"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200 bg-white text-gray-500"
                        >
                            <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Jenis Kelamin</option>
                            <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 md:mb-0">
                        <input
                            type="text"
                            name="golongan_darah"
                            id="golongan_darah"
                            placeholder="Golongan Darah (Optional)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                            value="{{ old('golongan_darah') }}"
                        >
                        @error('golongan_darah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>

                    <div class="mb-4">
                        <input
                            type="text"
                            name="username"
                            id="username"
                            placeholder="Username"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                            value="{{ old('username') }}"
                        >
                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Password"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                        >
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="Confirm Password"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                        >
                    </div>

                    <div class="mb-4">
                        <textarea
                            name="alamat"
                            id="alamat"
                            placeholder="Alamat"
                            required
                            rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200 resize-none"
                        >{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input
                            type="date"
                            name="tanggal_lahir"
                            id="tanggal_lahir"
                            placeholder="Tanggal Lahir"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200 text-gray-500"
                            value="{{ old('tanggal_lahir') }}"
                        >
                        @error('tanggal_lahir')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

            </div>

             @if ($errors->any() && !$errors->hasAny(['nama_lengkap', 'nik', 'no_telp', 'email', 'jenis_kelamin', 'golongan_darah', 'username', 'password', 'alamat', 'tanggal_lahir']))
                 <div class="mb-4 text-red-600">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif

            <div class="mt-8">
                <button
                    type="submit"
                    class="w-full md:w-auto md:px-10 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-200"
                >
                    Sign Up
                </button>
            </div>
        </form>
    </div>

</body>
</html>