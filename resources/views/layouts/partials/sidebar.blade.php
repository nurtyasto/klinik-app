<aside class="w-64 bg-gray-900 text-white min-h-screen flex flex-col shadow-lg transition-all duration-300">
    <div class="h-16 flex items-center px-6 bg-gray-900 border-b border-gray-800">
        <h1 class="text-xl font-bold text-blue-400 tracking-wider">KLINIK<span class="text-white">APP</span></h1>
    </div>
    
    <nav class="flex-1 px-4 py-6 space-y-2">
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <span class="font-medium">Dashboard</span>
        </a>
        
        <a href="{{ route('patients.index') }}" 
           class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('patients.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <span class="font-medium">Data Pasien</span>
        </a>
        
        <a href="{{ route('polyclinics.index') }}" 
           class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('polyclinics.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <span class="font-medium">Data Poliklinik</span>
        </a>
        
        <a href="{{ route('registrations.index') }}" 
           class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('registrations.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <span class="font-medium">Pendaftaran</span>
        </a>
    </nav>
</aside>