<x-app-layout>
    <x-slot name="header">
        Dashboard Utama
    </x-slot>

    <!-- Welcome Banner -->
    <div class="bg-blue-600 rounded-lg shadow-sm mb-6 p-6 text-white flex justify-between items-center">
        <div>
            <h3 class="text-2xl font-bold mb-1">Selamat datang, {{ Auth::user()->name }}!</h3>
            <p class="text-blue-100">Berikut adalah ringkasan operasional Klinik Anda hari ini.</p>
        </div>
        <div class="hidden md:block">
            <!-- Menampilkan Tanggal Hari Ini -->
            <p class="text-lg font-semibold bg-blue-700 px-4 py-2 rounded-lg shadow-inner">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </p>
        </div>
    </div>

    <!-- Stats Grid (Widget Ringkasan Data) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        
        <!-- Widget 1: Total Pasien -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-500">Total Pasien</p>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Patient::count() }}</p>
                </div>
            </div>
        </div>
        
        <!-- Widget 2: Poliklinik Aktif -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-500">Poliklinik Aktif</p>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Polyclinic::count() }}</p>
                </div>
            </div>
        </div>

        <!-- Widget 3: Antrean Hari Ini (Belum Diperiksa) -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-500">Antrean Menunggu</p>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Registration::whereDate('date', date('Y-m-d'))->whereNull('diagnosis')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Widget 4: Selesai Diperiksa Hari Ini -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-500">Selesai Diperiksa</p>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Registration::whereDate('date', date('Y-m-d'))->whereNotNull('diagnosis')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Quick Actions (Aksi Cepat) -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                Aksi Cepat
            </h3>
            <div class="space-y-3">
                <a href="{{ route('patients.create') }}" class="flex items-center justify-between p-3 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg transition-colors border border-blue-200 font-medium">
                    <span>Tambah Pasien Baru</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
                <a href="{{ route('registrations.create') }}" class="flex items-center justify-between p-3 bg-green-50 hover:bg-green-100 text-green-700 rounded-lg transition-colors border border-green-200 font-medium">
                    <span>Pendaftaran Berobat</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <!-- Tabel Antrean Terbaru Hari Ini -->
        <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-800">Antrean Hari Ini</h3>
                <a href="{{ route('registrations.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline">Lihat Semua Antrean</a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-y border-gray-200 text-gray-600 text-sm">
                            <th class="p-3 font-semibold">No RM</th>
                            <th class="p-3 font-semibold">Nama Pasien</th>
                            <th class="p-3 font-semibold">Poliklinik</th>
                            <th class="p-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <!-- Mengambil maksimal 5 data pendaftaran hari ini secara langsung -->
                        @php
                            $todayQueue = \App\Models\Registration::with(['patient', 'polyclinic'])
                                            ->whereDate('date', date('Y-m-d'))
                                            ->latest()
                                            ->take(5)
                                            ->get();
                        @endphp
                        
                        @forelse($todayQueue as $queue)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="p-3 font-medium text-gray-900">{{ $queue->patient->no ?? '-' }}</td>
                            <td class="p-3 font-medium">{{ $queue->patient->name ?? '-' }}</td>
                            <td class="p-3 text-gray-600">{{ $queue->polyclinic->name ?? '-' }}</td>
                            <td class="p-3">
                                @if($queue->diagnosis)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 animate-pulse">Menunggu</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    <p>Belum ada pasien yang mendaftar hari ini.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</x-app-layout>