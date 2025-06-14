<nav id="navbar" class="fixed top-0 left-0 h-full w-64 bg-green-600 hover:bg-green-700 text-white shadow-lg z-30 rounded-r-lg transform -translate-x-full flex flex-col">
    <div class="p-5 flex items-center justify-between">
        <div class="flex items-center space-x-2 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-white-600 group-hover:animate-pulse">
                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
            </svg>
            <span class="text-xl font-semibold">InnerWell</span>
        </div>
    </div>

    <div class="flex-grow p-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} text-white font-medium transition duration-150">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md {{ request()->routeIs('dashboard.admin.pembayaran*') ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10' }} text-white font-medium transition duration-150">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    <span>Pembayaran</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="p-4 border-t border-green-400 border-opacity-50">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 rounded-md text-white hover:bg-white hover:bg-opacity-10 transition duration-150">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</nav>