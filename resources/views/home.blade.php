<!DOCTYPE html>
<html lang="id">

<head>
    <title>Halaman Utama</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg border border-slate-200 text-center max-w-sm w-full">
        <h1 class="text-2xl font-bold text-slate-800 mb-2">Selamat Datang di AmikomEventHub</h1>
        <p class="text-slate-500 mb-6">Pilih halaman yang ingin Anda kunjungi:</p>
        
        <!-- Navigasi ke halaman lainnya -->
        <div class="space-y-4">
            <a href="{{ url('/profile') }}" class="inline-block bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-300">
                Profil
            </a>
            <a href="{{ url('/katalog') }}" class="inline-block bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-300">
                Katalog
            </a>
            <a href="{{ url('/bantuan') }}" class="inline-block bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-300">
                Bantuan
            </a>
            <a href="{{ url('/kontak') }}" class="inline-block bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-300">
                Kontak
            </a>
        </div>
    </div>
</body>

</html>