<header id="header" class="bg-white shadow-sm p-4 fixed top-0 left-0 right-0 z-20">
    <div class="flex justify-between items-center w-full">
        <div class="flex items-center space-x-4">
            <button id="navbar-toggle" class="text-gray-600 hover:text-green-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <div class="flex items-center space-x-2 text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                    <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                </svg>
                <span class="text-xl font-semibold hidden sm:inline">InnerWell Klinik - Admin</span>
            </div>
        </div>
        <div class="text-sm text-gray-600">
            Selamat datang, <span class="font-medium">{{ Auth::user()->nama_lengkap ?? 'Admin' }}</span>
        </div>
    </div>
</header>

<script>
    // Toggle sidebar
    document.addEventListener('DOMContentLoaded', function() {
        const navbarToggle = document.getElementById('navbar-toggle');
        const navbar = document.getElementById('navbar');
        
        if (navbarToggle && navbar) {
            navbarToggle.addEventListener('click', function() {
                navbar.classList.toggle('-translate-x-full');
            });
        }
    });
</script>