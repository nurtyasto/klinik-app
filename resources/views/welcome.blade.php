<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KlinikApp - Sistem Manajemen Terpadu</title>
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full antialiased bg-slate-50 text-slate-900 font-sans flex flex-col justify-between selection:bg-blue-600 selection:text-white">

    <!-- Navbar Minimalis Full-Width -->
    <header class="w-full bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 bg-blue-600 text-white rounded-lg flex items-center justify-center font-bold shadow-sm">
                        K
                    </div>
                    <h1 class="text-xl font-bold text-blue-600 tracking-wider">KLINIK<span class="text-slate-800">APP</span></h1>
                </div>
                <div>
                    @if (Route::has('login'))
                        <div class="flex items-center gap-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-all shadow-sm">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-blue-600 px-3 py-2 transition-colors">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-all shadow-sm">Daftar</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!-- Main Hero & Feature Section (Full Screen Viewport Fit) -->
    <main class="flex-1 flex items-center justify-center py-6 lg:py-0">
        <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Kolom Kiri: Informasi Utama -->
                <div class="lg:col-span-7 text-center lg:text-left space-y-6">
                    <span class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-100">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span> Sistem Informasi Klinik v1.0
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                        Solusi Modern Manajemen <span class="text-blue-600">Klinik & Rekam Medis</span>
                    </h2>
                    <p class="text-base sm:text-lg text-slate-600 max-w-xl mx-auto lg:mx-0">
                        Platform terpadu untuk mengoptimalkan pendaftaran pasien, antrean poliklinik, hingga rekam medis secara cepat, aman, dan efisien.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 pt-2">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto text-center px-6 py-3 text-base font-semibold rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-600/20 transition-all">
                                Buka Dashboard Utama &rarr;
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="w-full sm:w-auto text-center px-8 py-3.5 text-base font-semibold rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-600/20 transition-all">
                                Mulai Gunakan Sistem
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="w-full sm:w-auto text-center px-6 py-3.5 text-base font-semibold rounded-xl text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 transition-all">
                                    Registrasi Akun
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- Kolom Kanan: Quick Info / Fitur Cards Grid yang Compact -->
                <div class="lg:col-span-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-3.5">
                    
                    <!-- Card 1 -->
                    <div class="bg-white p-4 rounded-xl border border-slate-200/80 shadow-sm flex items-center gap-4 hover:border-blue-200 transition-colors">
                        <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 font-bold">
                            01
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-800">Manajemen Pasien</h4>
                            <p class="text-xs text-slate-500">No Rekam Medis ter-generate otomatis.</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white p-4 rounded-xl border border-slate-200/80 shadow-sm flex items-center gap-4 hover:border-blue-200 transition-colors">
                        <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0 font-bold">
                            02
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-800">Antrean Poliklinik</h4>
                            <p class="text-xs text-slate-500">Pendaftaran poli terstruktur dan real-time.</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white p-4 rounded-xl border border-slate-200/80 shadow-sm flex items-center gap-4 hover:border-blue-200 transition-colors">
                        <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0 font-bold">
                            03
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-800">Rekam Medis & Diagnosis</h4>
                            <p class="text-xs text-slate-500">Pencatatan tindakan dan resep dokter akurat.</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <!-- Footer Minimalis -->
    <footer class="w-full bg-white border-t border-slate-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-2">
            <p>&copy; {{ date('Y') }} KlinikApp. Hak cipta dilindungi.</p>
            <p>Sistem Informasi Manajemen Klinik Terpadu</p>
        </div>
    </footer>

</body>
</html>