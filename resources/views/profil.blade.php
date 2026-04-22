<!DOCTYPE html>
<html lang="id">

<head>
    <title>Profil Praktikan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg border border-slate-200 text-center max-w-sm w-full">
        <h1 class="text-2xl font-bold text-slate-800 mb-2">Profil Amikom</h1>
        <p class="text-slate-500 mb-6">Ini adalah halaman profil Amikom.</p>
        
        <!-- Informasi Praktikan -->
        <p class="text-slate-700 font-medium mb-2">Nama: Nvidia Sheila Luthfi Amanda</p>
        <p class="text-slate-700 font-medium mb-2">NIM: 24.12.3193</p>
        
        <a href="{{ route('home') }}" class="inline-block bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-300">
            Kembali ke Home
        </a>
    </div>
</body>

</html>