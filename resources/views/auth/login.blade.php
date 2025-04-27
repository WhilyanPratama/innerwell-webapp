<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
    </style>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 md:p-12 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl md:text-4xl font-bold mb-2 text-gray-900">Sign In</h1>
        <p class="text-gray-600 mb-1">Mohon Sign In untuk melanjutkan</p>
        <p class="text-sm text-gray-500 mb-6">Akses akun pasien untuk melihat atau mengelola catatan medis Anda.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Username"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                    value="{{ old('username') }}"
                >
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if (session('status'))
                <div class="mb-4 text-red-600">
                    {{ session('status') }}
                </div>
            @endif

            <button
                type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-200"
            >
                Sign In
            </button>
        </form>
    </div>

</body>
</html>
