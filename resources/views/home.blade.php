<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerWell Klinic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">

    <header class="sticky top-0 z-50 w-full bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="#" class="flex items-center space-x-2 group">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600 group-hover:animate-pulse">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                    <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                </svg>
                <span class="text-xl font-bold text-green-700 group-hover:text-green-800 transition-colors">
                    InnerWell Klinic
                </span>
            </a>

            <nav class="hidden md:flex items-center space-x-6 lg:space-x-8">
                <a href="#" class="text-sm font-medium text-gray-600 hover:text-green-700 transition-colors duration-200">
                    Home
                </a>
                <a href="#about-us" class="text-sm font-medium text-gray-600 hover:text-green-700 transition-colors duration-200">
                    About Us
                </a>
                <a href="#contact-us" class="text-sm font-medium text-gray-600 hover:text-green-700 transition-colors duration-200">
                    Contact Us
                </a>
            </nav>

            <div class="flex items-center space-x-2">
                @auth
                    <span class="text-sm text-gray-600 mr-2">{{ auth()->user()->nama_lengkap }} ({{ auth()->user()->role }})</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-9 px-3 bg-red-600 hover:bg-red-700 text-white transition-all duration-200 hover:shadow-md">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 px-3 hover:bg-gray-100">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-9 px-3 bg-green-600 hover:bg-green-700 text-white transition-all duration-200 hover:shadow-md">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-grow">
        <section class="relative py-20 md:py-28 lg:py-36 overflow-hidden bg-white">
            <div
                class="absolute top-0 right-0 -mt-24 -mr-20 lg:-mt-48 lg:-mr-48 w-1/2 lg:w-[45%] aspect-square rounded-full bg-gradient-to-br from-green-50 to-emerald-100 opacity-60 z-0"
                style="clip-path: ellipse(60% 80% at 100% 0%)"
            ></div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-20 items-center">
                    <div class="md:pr-8">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-5">
                            Kami Membantu Setiap Jiwa Untuk Mendapatkan Sistem Fasilitas Kesehatan Yang Layak
                        </h1>
                        <p class="text-gray-700 text-base lg:text-lg mb-8 text-justify leading-relaxed">
                            InnerWell Klinic adalah solusi layanan kesehatan modern yang mengedepankan kemudahan dan kenyamanan pasien. Kami menyediakan sistem pendaftaran online, manajemen antrian terintegrasi, serta pencatatan medis yang akurat untuk memastikan setiap pasien mendapatkan perawatan tepat waktu. Dengan tim medis profesional dan teknologi terkini, kami berkomitmen menghadirkan pengalaman pelayanan kesehatan yang aman, efisien, dan transparan bagi seluruh lapisan masyarakat.
                        </p>
                        @auth
                            <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 px-8 py-3 bg-green-600 hover:bg-green-700 text-white transition-all duration-200 hover:shadow-lg">
                                Kembali Ke Dashboard
                            </button>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 px-8 py-3 bg-green-600 hover:bg-green-700 text-white transition-all duration-200 hover:shadow-lg">
                                Daftar Sekarang
                            </a>
                        @endauth
                    </div>

                    <div class="flex justify-center items-center bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl shadow-md aspect-video md:aspect-square p-6">
                        <div class="text-gray-500 text-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-16 w-16 text-gray-400 mx-auto mb-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                            <p class="font-medium">[Gambar tim medis berdiskusi]</p>
                            <span class="text-sm text-gray-400">(Placeholder)</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about-us" class="py-16 md:py-24 bg-gradient-to-b from-gray-50 to-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <h2 class="text-base font-semibold text-green-600 uppercase tracking-wider mb-2">
                        Jadi
                    </h2>
                    <h3 class="text-3xl sm:text-4xl font-bold text-gray-900">
                        Apa & Siapa Kami ?
                    </h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-20 items-center">
                    <div class="order-2 md:order-1 flex justify-center items-center bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl shadow-md aspect-video md:aspect-[4/3] p-6">
                        <div class="text-gray-500 text-center">
                             <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-16 w-16 text-gray-400 mx-auto mb-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>
                            <p class="font-medium">[Gambar ilustrasi pasien]</p>
                            <span class="text-sm text-gray-400">(Placeholder)</span>
                        </div>
                    </div>

                    <div class="order-1 md:order-2 md:pl-8 space-y-5 text-gray-700 text-base leading-relaxed">
                        <p class="text-justify">
                            Kami adalah InnerWell Klinik, sebuah klinik modern yang mengutamakan kualitas layanan kesehatan serta kenyamanan pasien. Dengan pendekatan inovatif dan teknologi terkini, kami berfokus pada pencegahan, diagnosa, hingga pengobatan yang menyeluruh. Misi kami adalah membangun komunitas yang lebih sehat, memperkuat kesejahteraan bersama, dan memastikan setiap individu mendapatkan akses perawatan terbaik.
                        </p>
                        <p class="text-justify">
                            Kesehatan saat ini menjadi salah satu pilar penting dalam kehidupan. Kemampuan untuk terhubung secara real-time dengan pasien, memberikan konsultasi cepat, dan memastikan penanganan tepat sasaran adalah kunci kesuksesan kami. Di InnerWell Klinik, kami berkolaborasi dengan tim medis profesional dan memanfaatkan platform digital untuk memberikan layanan yang efisien, transparan, dan mudah dijangkau.
                        </p>
                        <p class="text-justify">
                            Sudah 2025 - waktunya memutuskan langkah untuk menjaga kesehatan Anda. Apakah Anda akan membiarkan kesehatan terabaikan, atau berjuang menuju kehidupan yang lebih baik? Bersama InnerWell Klinik, mari kita ciptakan strategi kesehatan holistik yang membantu Anda menjalani hidup dengan kualitas terbaik.
                        </p>
                        <p class="font-semibold text-green-700 pt-3 text-lg">
                            We are your Healthcare Partner.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="contact-us" class="bg-gray-800 text-gray-400 pt-12 pb-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="md:col-span-1">
                    <div class="flex items-center space-x-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-400">
                            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                            <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                        </svg>
                        <span class="text-xl font-bold text-white">
                            InnerWell Klinic
                        </span>
                    </div>
                    <p class="text-sm">
                        Menyediakan layanan kesehatan modern, efisien, dan terpercaya untuk Anda dan keluarga.
                    </p>
                    @auth
                        <div class="mt-4 text-sm">
                            <p>Selamat datang, {{ auth()->user()->nama_lengkap }}</p>
                            <p class="text-green-400">{{ auth()->user()->role }}</p>
                        </div>
                    @endauth
                </div>

                <div class="hidden md:block md:col-span-1"></div>

                <div class="md:col-span-1">
                    <h5 class="text-lg font-semibold text-white mb-4">
                        Kontak Kami
                    </h5>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-400 mt-1 flex-shrink-0">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                            <a href="tel:0000000000" class="hover:text-white transition-colors">
                                0000000000
                            </a>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-400 mt-1 flex-shrink-0">
                                <rect width="20" height="16" x="2" y="4" rx="2"/>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                            <a href="mailto:InnerWell@email.com" class="hover:text-white transition-colors">
                                InnerWell@email.com
                            </a>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-400 mt-1 flex-shrink-0">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            <span>Surakarta</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
