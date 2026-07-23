<header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6 shadow-sm z-10">
    <!-- Judul Halaman Dinamis -->
    <div>
        @if (isset($header))
            <h2 class="text-xl font-semibold text-gray-800 leading-tight">
                {{ $header }}
            </h2>
        @else
            <h2 class="text-xl font-semibold text-gray-800 leading-tight">
                Dashboard
            </h2>
        @endif
    </div>

    <!-- User Menu & Logout -->
    <div class="flex items-center gap-4">
        <span class="text-sm text-gray-600 font-medium">{{ Auth::user()->name }}</span>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="px-4 py-2 bg-red-50 text-red-600 text-sm font-semibold rounded-lg hover:bg-red-100 transition-colors">
                Logout
            </button>
        </form>
    </div>
</header>